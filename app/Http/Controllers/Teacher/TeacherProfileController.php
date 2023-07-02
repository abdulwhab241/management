<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    public function index()
    {

        $information = Teacher::findOrFail(auth()->user()->id);
        return view('pages.Teachers.dashboard.profile', compact('information'));

    }

    public function editImage(Request $request)
    {
        $request->validate([
            'photos'=>'required',
        ]);
        // dd($request);
        $file_extension = $request->photos->getClientOriginalExtension();
        $file_name = time(). '.' . $request->Name . '.' . $file_extension;
        $path = 'attachments/Profile';
        $request->photos->move($path, $file_name);

        try
        {
            $information = Teacher::findOrFail(strip_tags($request->id));
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

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $information = Teacher::findOrFail(strip_tags($request->id));

        if (!empty($request->password)) {
            $information->password = Hash::make(strip_tags($request->password));
            $information->save();
        } 
        toastr()->success('تم تعـديـل كلمـة السـر بنجـاح');
        return redirect()->back();

    }

    public function Read()
    {
        $user = Teacher::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
    
}
