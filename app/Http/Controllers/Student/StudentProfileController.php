<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function index()
    {

        $information = Student::findOrFail(auth()->user()->id);
        return view('pages.Students.profile', compact('information'));

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
            $information = Student::findOrFail(strip_tags($request->id));
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

        $information = Student::findOrFail(strip_tags($request->id));

        if (!empty($request->password)) {
            $information->password = Hash::make(strip_tags($request->password));
            $information->save();
        } 

        toastr()->success('تم تعـديـل كلمـة السـر بنجـاح');
        return redirect()->back();

    }
}
