<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Models\TeacherSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MidResultRequest;

class StudentMidResultController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $MidResults = MidResult::where('year', date('Y'))->whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.StudentMidResults.index',compact('MidResults'));
    }

    public function create()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();
        $Subjects = TeacherSubject::where('teacher_id', auth()->user()->id)->where('year',date('Y'))->get();
        return view('pages.Teachers.dashboard.StudentMidResults.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $MidResult = MidResult::findOrFail($id);
        return view('pages.Teachers.dashboard.StudentMidResults.edit', compact('MidResult'));
    }

    public function store(MidResultRequest $request)
    {
        try
        {

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))
            ->whereIn('month_id',[1,2,3])->sum('degree');

            if($Degree == null)
            {
                $Degree = 0 ;
            }

            $Result = round($Degree / 15);

            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Total = $Result + strip_tags($request->Degree);

            $MidResults = new MidResult();
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->result = $Result;

            foreach ($Sections as $section){
                $MidResults->section_id = $section;
            }

            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->mid_exam = strip_tags($request->Degree);
            $MidResults->total = $Total;
            $MidResults->year = date('Y');
            $MidResults->date = date('Y-m-d');
            $MidResults->mid_status = 0;
            $MidResults->create_by = auth()->user()->name;
            $MidResults->save();


            toastr()->success('تم إضـافـة نتيـجة الطـالـب للتـرم الاول بنجاح');
            return redirect()->route('StudentMidResults.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(MidResultRequest $request)
    {
        try
        {

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))
            ->whereIn('month_id',[1,2,3])->sum('degree');

            if($Degree == null)
            {
                $Degree = 0 ;
            }
            $Result = round($Degree / 15);
            
            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Total = $Result + strip_tags($request->Degree);

            $MidResults = MidResult::findOrFail(strip_tags($request->id));
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->result = $Result;

            foreach ($Sections as $section){
                $MidResults->section_id = $section;
            }

            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->mid_exam = strip_tags($request->Degree);
            $MidResults->total = $Total;
            $MidResults->year = date('Y');
            $MidResults->mid_status = 0;
            $MidResults->date = date('Y-m-d');
            $MidResults->create_by = auth()->user()->name;
            $MidResults->save();


            toastr()->success('تم تعـديـل نتيـجة الطـالـب للتـرم الاول بنجاح');
            return redirect()->route('StudentMidResults.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
