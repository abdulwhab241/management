<?php

namespace App\Http\Controllers;

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
}
