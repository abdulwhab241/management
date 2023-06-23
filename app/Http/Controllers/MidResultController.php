<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MidResultRequest;

class MidResultController extends Controller
{
    public function index()
    {
        $MidResults = MidResult::where('year', date('Y'))->get();
        return view('pages.Mid_Results.index', compact('MidResults'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        $Student_Grades = StudentGrade::where('year', date("Y"))->get();
        return view('pages.Mid_Results.add', compact('Students','Subjects','Student_Grades'));
    }

    public function store(Request $request)
    {
        $Degrees = StudentGrade::where('student_id',$request->Student_id)->pluck('total');
        foreach ($Degrees as $Degree) {
            $ids = explode('SUM',$Degree->total);
        // $test = $request->Degree_id;
            return$$Degrees;
           
        }

        // $orders = DB::table('orders')
        //         ->select('department', DB::raw('SUM(price) as total_sales'))
        //         ->groupBy('department')
        //         ->havingRaw('SUM(price) > ?', [2500])
        //         ->get();

        try
        {
            // dd($request);
            // $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            // $Degrees = StudentGrade::where('student_id',$request->Student_id)->pluck('sum("total")');
            // foreach ($Degrees as $Degree) {
            //     $ids = explode('+',$Degree->sum('total'));
            //     return$$Degrees;
            // }
            // $total = 0;
            // $sub_total = strip_tags($request->amount) * strip_tags($request->Discount) / 100;
            // $total += $sub_total;
            // $All = strip_tags($request->amount) - $sub_total;

            // $MidResults = new MidResult();
            // $MidResults->student_id = strip_tags($request->Student_id);
            // $MidResults->subject_id = strip_tags($request->Subject_id);
            // $MidResults->result = strip_tags($request->Degree_id);


            // foreach ($classrooms as $classroom){
            //     $MidResults->classroom_id = $classroom;
            // }

            // $MidResults->mid_exam = strip_tags($request->Degree);
            // $MidResults->year = date('Y');
            // $MidResults->date = date('Y-m-d');
            // $MidResults->create_by = auth()->user()->name;
            // $MidResults->save();


            // toastr()->success('تم إضـافـة نتيـجة الطـالـب للتـرم الاول بنجاح');
            // return redirect()->route('MidResults.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
