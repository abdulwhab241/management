<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //use AuthenticatesUsers;

    public function loginForm($type){

        return view('login',compact('type'));
    }

    public function login(Request $request)
    {
        if (Auth::guard($this->checkGuard($request))->attempt(['name' => strip_tags($request->name), 'password' => strip_tags($request->password)])) {
            return $this->redirect($request);
        }
        return redirect('/login')->with('message', 'لـيس مخـول لـك بالـدخـول');

    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // public function destroy(Request $request)
    // {
    //     Auth::guard('student')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
