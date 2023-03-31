<?php

namespace App\Repository;

use App\Models\Image;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\TeacherAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterFace
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function GetSpecializations()
    {
        return Specialization::all();
    }

    public function GetGender()
    {
        return Gender::all();
    }

    public function storeTeachers($request)
    {
            // Save Images
            $file_extension = $request->Photo->getClientOriginalExtension();
            $file_name = $request->Name . '.' . $file_extension;
            $path = 'attachments/Teachers';
            $request->Photo->move($path, $file_name);

        try {
            $Teachers = new Teacher();
            $Teachers->name = $request->Name;
            $Teachers->image = $file_name;
            $Teachers->phone_number = $request->Phone_Number;
            $Teachers->specialization_id = $request->Specialization_id;
            $Teachers->gender_id = $request->Gender_id;
            $Teachers->joining_date = $request->Joining_Date;
            $Teachers->address = $request->Address;
            $Teachers->create_by = auth()->user()->name;

            $Teachers->save();

            toastr()->success('تم حفظ المعلم بنجاح');
    
            return redirect()->route('Teachers.create');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateTeachers($request)
    {
        // Save Images
        $file_extension = $request->Photo->getClientOriginalExtension();
        $file_name = $request->Name . '.' . $file_extension;
        $path = 'attachments/Teachers';
        $request->Photo->move($path, $file_name);
        try {
            $Teachers = Teacher::findOrFail($request->id);
    
            $Teachers->name = $request->Name;
            $Teachers->image = $file_name;
            $Teachers->phone_number = $request->Phone_Number;
            $Teachers->specialization_id = $request->Specialization_id;
            $Teachers->gender_id = $request->Gender_id;
            $Teachers->joining_date = $request->Joining_Date;
            $Teachers->address = $request->Address;
            $Teachers->create_by = auth()->user()->name;
            $Teachers->save();
            toastr()->success('تم تعديل المعلم بنجاح');
    
            return redirect()->route('Teachers.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }

    public function deleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error('تم حذف المعلم بنجاح');
        return redirect()->route('Teachers.index');
    }

    
    
}




