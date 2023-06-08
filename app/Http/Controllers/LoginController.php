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
        toastr()->error('عـذراً أسم المستخدم او كلمة المرور غير صحيحة يرجى التاكد من صحة البيانات المدخلة ');
        return redirect()->back();

    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
