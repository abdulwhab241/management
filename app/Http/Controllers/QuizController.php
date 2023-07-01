<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Month;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\TeacherSubject;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\QuizNotification;
use Illuminate\Support\Facades\Notification;

class QuizController extends Controller
{
    public function index()
    {
        $Exams = Exam::where('year', date('Y'))->get();
        
        return view('pages.Quizzes.index', compact('Exams'));
    }

    public function create()
    {
        $Teachers = Teacher::all();
        $Subjects = Subject::where('year',date('Y'))->get();
        $Classrooms = Classroom::where('year',date('Y'))->get();
        $Months = Month::all();
        
        return view('pages.Quizzes.add', compact('Teachers','Subjects','Classrooms','Months'));
    }

    public function edit($id)
    {
        $Exam = Exam::findOrFail($id);
        $Teachers = Teacher::all();
        $Subjects = Subject::where('year',date('Y'))->get();
        $Classrooms = Classroom::where('year',date('Y'))->get();
        $Months = Month::all();
        
        return view('pages.Quizzes.edit', compact('Teachers','Subjects','Classrooms','Months','Exam'));
    }

    public function show($id)
    {
        $Quizzes = Exam::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->quiz_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Quizzes.notification', compact('Quizzes'));
    }

    public function store(QuizRequest $request)
    {
        try
        {
            $Exam = new Exam();
            $Exam->classroom_id = strip_tags($request->Classroom_id);
            $Exam->teacher_id = strip_tags($request->Teacher_id);
            $Exam->subject_id = strip_tags($request->Subject_id);
            $Exam->month_id = strip_tags($request->Exam_Date);
            $Exam->total_marks = strip_tags($request->Total);
            $Exam->year = date('Y');
            $Exam->create_by = auth()->user()->name;
            $Exam->save();

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new QuizNotification($Exam->id,$create_by,$Exam->create_by));
            toastr()->success('تم إضـافـة الأختبـار بنجاح');
            return redirect()->route('Quizzes.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(QuizRequest $request)
    {
        try
        {
            // dd($request);
            $Exam = Exam::findOrFail(strip_tags($request->id));
            $Exam->classroom_id = strip_tags($request->Classroom_id);
            $Exam->teacher_id = strip_tags($request->Teacher_id);
            $Exam->subject_id = strip_tags($request->Subject_id);
            $Exam->month_id = strip_tags($request->Exam_Date);
            $Exam->total_marks = strip_tags($request->Total);
            $Exam->year = date('Y');
            $Exam->create_by = auth()->user()->name;
            $Exam->save();
            
            toastr()->success('تم تعديل الأختبـار بنجاح');
            return redirect()->route('Quizzes.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Exam::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تم حذف الأختبـار بنجاح');
        return redirect()->route('Quizzes.index');
    }

    
}
