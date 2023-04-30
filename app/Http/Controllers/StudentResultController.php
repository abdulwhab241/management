<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function index()
    {

        $Result = Result::select('*')->where('student_id', auth()->user()->id)->get();
    
        return view('pages.Students.Result.index',compact('Result'));
    }
}
