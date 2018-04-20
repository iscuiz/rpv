<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function showLinkRequestForm()
    {
        return view('auth/passwords/email');
    }
    public function sendResetLinkEmail()
    {
        return view('user/forgot-pass');
    }
}
