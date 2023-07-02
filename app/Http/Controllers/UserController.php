<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view('pages.Users.index',compact('Users'));
    }

    public function create()
    {
        return view('pages.Users.add');
    }

    public function show_profile()
    {
        return view('pages.Users.profile');
    }


    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('pages.Users.edit',compact('User'));
    }

    public function store(UserRequest $request)
    {
        try {

            // $file_extension = $request->photos->getClientOriginalExtension();
            // $file_name = time(). '.' . $request->Name . '.' . $file_extension;
            // $path = 'attachments/Profile';
            // $request->photos->move($path, $file_name);

            $Users = new User();
    
            $Users->name = strip_tags($request->Name);
            $Users->phone_number = strip_tags($request->Phone_Number);
            // $Users->image = $file_name;
            $Users->job = strip_tags($request->Job);
            $Users->address = strip_tags($request->Address);
            $Users->password =  Hash::make(strip_tags($request->Phone_Number));


            $Users->save();

            toastr()->success('تم إضـافـة المستخدم بنجاح');
            return redirect()->route('Users.create');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(UserRequest $request)
    {
        try {

            // $file_extension = $request->photos->getClientOriginalExtension();
            // $file_name = time(). '.' . $request->Name . '.' . $file_extension;
            // $path = 'attachments/Profile';
            // $request->photos->move($path, $file_name);

            $Users = User::findOrFail(strip_tags($request->id));
    
            $Users->name = strip_tags($request->Name);
            $Users->phone_number = strip_tags($request->Phone_Number);
            // $Users->image = $file_name;
            $Users->job = strip_tags($request->Job);
            $Users->address = strip_tags($request->Address);
            $Users->password =  Hash::make(strip_tags($request->Phone_Number));


            $Users->save();

            toastr()->success('تم تعديل المستخدم بنجاح');
            return redirect()->route('Users.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit_user_Image(Request $request)
    {
        $request->validate([
            'photos'=>'required',
        ]);
        // dd($request);
        $file_extension = $request->photos->getClientOriginalExtension();
        $file_name = time(). '.' . $request->Name . '.' . $file_extension;
        $path = 'attachments/Admins';
        $request->photos->move($path, $file_name);

        try
        {
            $information = User::findOrFail(strip_tags($request->id));
            $information->image = $file_name;
            $information->save();

            toastr()->success('تم تعـديـل الصـورة بنجـاح');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit_user_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $information = User::findOrFail(strip_tags($request->id));

        if (!empty($request->password)) {
            $information->password = Hash::make(strip_tags($request->password));
            $information->save();
        } 
        toastr()->success('تم تعـديـل كلمـة السـر بنجـاح');
        return redirect()->back();
    }
}
