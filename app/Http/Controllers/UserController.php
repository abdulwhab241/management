<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view('pages.Users.index',compact('Users'));
    }

    public function create()
    {
        return view('pages.Users.add');
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('pages.Users.edit',compact('User'));
    }
}
