<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassRequest;
class UserController extends Controller
{
    //
    public function showFormChangePass()
    {
        return view('auth/passwords/change');
    }

    public function changePass(ChangePassRequest $request)
    {
        $user = User::findOrfail(\Auth::user()->id);
        if($user)
        {
            $user->password = bcrypt($request->password);
            $user->save();
            \Auth::logout();
            return redirect('/');
        }
    }
}
