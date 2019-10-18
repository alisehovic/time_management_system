<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Country;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('welcome');
    }


    public function getRegister()
    {
        $countries = Country::all();

        return view('register',
            [
                'countries'=> $countries,

            ]

            ); 
    }

    public function postRegister(Request $request)
    {   
        $countries = Country::all();

          $rules = [
        'email'    => 'required|email|unique:users',
        'city'  => 'required',
        'password' => [
            'required',
            'min:8',
            'confirmed',
        ],
    ];

    $validation = \Validator::make( $request->all(), $rules );

    if ( $validation->fails() ) {

        return view("register",                       
            [
                "error_response"=>  $validation->errors()->all(),
                "countries" => $countries,


             ]
        );


    } else {
                $user = new User();
                $user->email = $request->email;
                $user->preffered_working_hours=0;
                $user->password = Hash::make($request->password);
                $user->role=1;
                $user->city = $request->city;
                $user->country_id = $request->country;
                $user->save();

        return redirect("/");
          }
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


