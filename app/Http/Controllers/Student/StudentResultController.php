<?php

namespace App\Http\Controllers\Student;

use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentResultController extends Controller
{
    public function index()
    {
        $Result = Result::select('*')->where('student_id', auth()->user()->id)
                        ->where('section_id', auth()->user()->section_id)
                        ->where('year', date('Y'))->get();
    
        return view('pages.Students.Result.index',compact('Result'));
    }

    public function show($id)
    {
        $Results = Result::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->teacher_result_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Students.information.result', compact('Results'));
    }

}
