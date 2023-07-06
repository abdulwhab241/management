<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
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
        $My_Classes = Classroom::where('year',date('Y'))->get();
        $Grades = Grade::where('year',date('Y'))->get();
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
                $My_Classes->year = date('Y');
                $My_Classes->save();

                // $users = User::all();
                $users = User::where('id', '!=', auth()->user()->id)->get();
                $create_by = auth()->user()->name;

                Notification::send($users, new ClassroomNotification($My_Classes->id,$create_by,$My_Classes->name_class));
            
                toastr()->success('تم إضـافة الـصـف بنجاح');
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
            $Classrooms->year = date('Y'),
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

        $MyStudent_id = Student::where('classroom_id',strip_tags($request->id))->pluck('classroom_id');

        if($MyStudent_id->count() == 0){

            $Classrooms = Classroom::findOrFail(strip_tags($request->id))->delete();
            toastr()->error('تم حذف الـصـف الـدراسـي بنجاح');
            return redirect()->route('Classrooms.index');
        }

        else{

            toastr()->warning(' لايمكن حذف الـصـف الـدراسـي بسبب وجود طـلاب تابعة لـه احـذف الـطـلاب التابعة لـه ثم احذف الـصـف الـدراسـي');
            return redirect()->route('Classrooms.index');
        }
    }

    }


