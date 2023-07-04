<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Models\TeacherSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FinalRequest;
use App\Http\Controllers\Controller;

class StudentFinalResultController extends Controller
{
    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Final_Results = FinalResult::where('year', date('Y'))->whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.StudentFinalResults.index', compact('Final_Results'));
    }

    public function create()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Students = MidResult::distinct()->where('year', date('Y'))->whereIn('section_id', $ids)->get(['student_id']);
        $Subjects = TeacherSubject::where('year', date('Y'))->where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.StudentFinalResults.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $Final_Result = FinalResult::findOrFail($id);
        return view('pages.Teachers.dashboard.StudentFinalResults.edit',compact('Final_Result'));
    }

    public function store(FinalRequest $request)
    {
        try {

            $Mids = MidResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id', strip_tags($request->Subject_id))->where('year', date('Y'))->pluck('id');

            if($Mids->count() == 0)
            {
                toastr()->error('عـذاً هـذا الـطالـب لا تـوجد لـه محصـلة للـترم الأول الرجاء إضافة محصلة للترم الاول لـهذي المادة');
                return redirect()->back();
            }

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }

            $Result = round($Degree / 30);

            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Students = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('student_id');

            $Total = $Result + strip_tags($request->Degree);

            $Final_Results = new FinalResult();
            $Final_Results->subject_id = strip_tags($request->Subject_id);

            foreach ($Students as $student){
                $Final_Results->student_id = $student;
            }

            foreach ($Mids as $Mid){
                $Final_Results->mid_id = $Mid;
            }

            foreach ($Sections as $section){
                $Final_Results->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->result =  $Result;
            $Final_Results->final_exam = strip_tags($request->Degree);
            $Final_Results->total = $Total;
            $Final_Results->year = date('Y');
            $Final_Results->final_status = 0;
            $Final_Results->date = date('Y-m-d');
            $Final_Results->create_by = auth()->user()->name;
            $Final_Results->save();

            toastr()->success('تـم إضـافـة نتيـجة الطـالـب للـترم الثـانـي بنجـاح');
            return redirect()->route('StudentFinalResults.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(FinalRequest $request)
    {
        try
        {

            $Mids = MidResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id', strip_tags($request->Subject_id))->where('year', date('Y'))->pluck('id');

            if($Mids->count() == 0)
            {
                toastr()->error('عـذاً هـذا الـطالـب لا تـوجد لـه محصـلة للـترم الأول الرجاء إضافة محصلة للترم الاول لـهذي المادة');
                return redirect()->back();
            }

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }

            $Result = round($Degree / 30);

            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');
            
            $Students = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('student_id');

            $Total = $Result + strip_tags($request->Degree);

            $Final_Results = FinalResult::findOrFail($request->id);
            $Final_Results->subject_id = strip_tags($request->Subject_id);

            foreach ($Students as $student){
                $Final_Results->student_id = $student;
            }

            foreach ($Mids as $Mid){
                $Final_Results->mid_id = $Mid;
            }

            foreach ($Sections as $section){
                $Final_Results->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->result =  $Result;
            $Final_Results->final_exam = strip_tags($request->Degree);
            $Final_Results->total = $Total;
            $Final_Results->year = date('Y');
            $Final_Results->final_status = 0;
            $Final_Results->date = date('Y-m-d');
            $Final_Results->create_by = auth()->user()->name;
            $Final_Results->save();
            
            toastr()->success('تـم تعديل نتيـجة الطـالـب للـترم الثـانـي بنجـاح');
            return redirect()->route('StudentFinalResults.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
