<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function index()
    {

        $information = Student::findOrFail(auth()->user()->id);
        return view('pages.Students.profile', compact('information'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $information = Student::findOrFail($id);

        if (!empty($request->password)) {
            // $information->name =  $request->Name;
            $information->password = Hash::make(strip_tags($request->password));
            $information->save();
        } 
        // else {
        //     $information->Name =  $request->Name;
        //     $information->save();
        // }
        toastr()->success('تم تعـديـل كلمـة السـر بنجـاح');
        return redirect()->back();

    }
}
