<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClassroomRequest;
use App\Notifications\ClassroomNotification;
use Illuminate\Support\Facades\Notification;

class ClassroomController extends Controller
{
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.Classrooms.index',compact('My_Classes','Grades'));
    }

    public function show($id)
    {
        $Classrooms = Classroom::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->classroom_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Classrooms.notification', compact('Classrooms'));
    }

    public function store(ClassroomRequest $request)
    {
        
        try
            {
                $My_Classes = new Classroom();
                $My_Classes->name_class = strip_tags($request->Name);
                $My_Classes->grade_id = strip_tags($request->Grade_id);
                $My_Classes->create_by = auth()->user()->name;
                $My_Classes->save();

                // $users = User::all();
                $users = User::where('id', '!=', auth()->user()->id)->get();
                $create_by = auth()->user()->name;

                Notification::send($users, new ClassroomNotification($My_Classes->id,$create_by,$My_Classes->name_class));
            
                toastr()->success('تم حفظ الـصـف بنجاح');
                return redirect()->route('Classrooms.index');
            }
            catch(\Exception $e)
            {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    public function update(ClassroomRequest $request)
    {
        try
        {
            $Classrooms = Classroom::findOrFail(strip_tags($request->id));
            $Classrooms->update([
            $Classrooms->name_class = strip_tags($request->Name),
            $Classrooms->grade_id = strip_tags($request->Grade_id),
            $Classrooms->create_by = auth()->user()->name,
            ]);
            toastr()->success('تم تعديل الـصـف بنجاح');
            return redirect()->route('Classrooms.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Classroom::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تم حذف الـصـف بنجاح');
        return redirect()->route('Classrooms.index');
    }

    // public function delete_all(Request $request)
    // {
    //     $delete_all_id = explode(",", $request->delete_all_id);

    //     Classroom::whereIn('id', $delete_all_id)->Delete();
    //     toastr()->warning('تم حذف الصفوف بنجاح');
    //     return redirect()->route('Classrooms.index');
    // }

    // public function Filter_Classes(Request $request)
    // {
    //     $Grades = Grade::all();
    //     $Search = Classroom::select('*')->where('grade_id','=',strip_tags($request->Grade_id))->get();
    //     return view('pages.Classrooms.index',compact('Grades'))->withDetails($Search);
    // }
}
