<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\MidResult;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Exports\MidResultExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MidResultRequest;

class MidResultController extends Controller
{
    public function index()
    {
        $MidResults = MidResult::where('year', date('Y'))->get();
        $Classrooms = Classroom::where('year', date("Y"))->get();
        $Students = MidResult::distinct()->where('year', date('Y'))->get(['student_id']);
        return view('pages.Mid_Results.index', compact('MidResults','Students','Classrooms'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::where('year', date("Y"))->get();
        return view('pages.Mid_Results.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $MidResult = MidResult::findOrFail($id);
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::where('year', date("Y"))->get();
        return view('pages.Mid_Results.edit', compact('Students','Subjects','MidResult'));
    }

    public function export() 
    {
        return Excel::download(new MidResultExport, 'نتائج الطلاب للترم الاول.xlsx');
    }
    
    public function add_student_mid(Request $request)
    {
        $request->validate([
            'Student_id'=>'required|integer',
        ]);

        $MidResults = MidResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->get();
        $Name = MidResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->first();
        return view('pages.Mid_Results.show', compact('MidResults','Name'));
    }

    public function send_mid_result(Request $request)
    {
        try
        {

            $request->validate([
                'Classroom_id'=>'required|integer',
            ]);

            $students = MidResult::where('classroom_id',$request->Classroom_id)->where('year', date('Y'))->get();

            if($students->count() < 1){
                toastr()->error('لاتوجد بيانات لـهـذا الـصـف في جدول نتـائـج الـترم الاول لـلـطـلاب');
                return redirect()->back();
            }

            foreach ($students as $student){

                $ids = explode(',',$student->id);
                MidResult::whereIn('id', $ids)
                    ->update([
                        'mid_status'=> 1,
                        'create_by' =>auth()->user()->name,
                    ]);
                }
        
            toastr()->success('تم إرسـال نتـائـج الـطـلاب للتـرم الاول بنجاح');
            return  redirect()->back();

        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

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
            return redirect()->route('MidResults.create');
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
            return redirect()->route('MidResults.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        MidResult::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تـم حـذف نتيـجة الطـالـب للتـرم الاول بنجاح');
        return redirect()->route('MidResults.index');
    }

}
