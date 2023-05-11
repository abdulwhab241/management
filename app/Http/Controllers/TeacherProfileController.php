<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    public function index()
    {

        $information = Teacher::findOrFail(auth()->user()->id);
        return view('pages.Teachers.dashboard.profile', compact('information'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $information = Teacher::findOrFail($id);

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
