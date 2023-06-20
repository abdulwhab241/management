<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\TeacherAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TeacherNotification;
use Illuminate\Support\Facades\Notification;

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

        try {
            $Teachers = new Teacher();
            $Teachers->name = strip_tags($request->Name);
            $Teachers->password = Hash::make(strip_tags($request->Phone_Number));
            $Teachers->phone_number = strip_tags($request->Phone_Number);
            $Teachers->specialization_id = strip_tags($request->Specialization_id);
            $Teachers->gender_id = strip_tags($request->Gender_id);
            $Teachers->joining_date = strip_tags($request->Joining_Date);
            $Teachers->address = strip_tags($request->Address);
            $Teachers->create_by = auth()->user()->name;

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Teachers/'.$Teachers->name, $file->getClientOriginalName(),'upload_attachments');

                    $Teachers->image=$name;
                }
            }

            $Teachers->save();

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new TeacherNotification($Teachers->id,$create_by,$Teachers->name));
        

            toastr()->success('تم إضـافـة معلومـات المعلم بنجاح');
    
            return redirect()->route('Teachers.create');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateTeachers($request)
    {

        try {
            $Teachers = Teacher::findOrFail(strip_tags($request->id));
    
            $Teachers->name = strip_tags($request->Name);
            $Teachers->password = Hash::make(strip_tags($request->Phone_Number));
            $Teachers->phone_number = strip_tags($request->Phone_Number);
            $Teachers->specialization_id = strip_tags($request->Specialization_id);
            $Teachers->gender_id = strip_tags($request->Gender_id);
            $Teachers->joining_date = strip_tags($request->Joining_Date);
            $Teachers->address = strip_tags($request->Address);
            $Teachers->create_by = auth()->user()->name;

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Teachers/'.$Teachers->name, $file->getClientOriginalName(),'upload_attachments');

                    $Teachers->image=$name;
                }
            }

            $Teachers->save();
            toastr()->success('تم تعديل معلومـات المعلم بنجاح');
    
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
        Teacher::findOrFail(strip_tags($request->id))->delete();
        toastr()->error('تم حذف المعلم بنجاح');
        return redirect()->route('Teachers.index');
    }

    
    
}




