<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view("auth/login");
    }

    public function auth(Request $request)
    {
        $credentials = $request->except('_token');
        if(\Auth::attempt($credentials))
        {
            return redirect()->intended('/');;
        }
         return redirect()->back()->with(['error'=>'Credenciais Inválidas']);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

}
