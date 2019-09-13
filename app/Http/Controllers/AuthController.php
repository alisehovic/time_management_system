<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('welcome');
    }


    public function getRegister()
    {
        return view("register");
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->psw);
        $user->preffered_working_hours=0;
        $user->save();

        return redirect("/");
    }

    public function postLogin( Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
           return redirect("/home");
        } else {
            return redirect("/");
        }
    }
}


