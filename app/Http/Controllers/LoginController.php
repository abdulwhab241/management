<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //use AuthenticatesUsers;

    public function loginForm($type){

        return view('login',compact('type'));
    }

    public function login(Request $request){
        if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
        }
    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
