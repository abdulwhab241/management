<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FundAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('selection');
    // }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function box()
    {
        $Boxes = FundAccount::all();
        return view('pages.Boxes.index',compact('Boxes'));
    }

    public function Filter_Boxes(Request $request)
    {
        
        $Boxes = FundAccount::all();
        $Search = Student::where('name', 'LIKE', '%'. strip_tags($request->Search ).'%')->latest()->get();

        return view('pages.Boxes.index',compact('Boxes'))->withDetails($Search);
    }
}
