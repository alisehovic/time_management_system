<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Work;
use Illuminate\Validation\Rule;



class AdminController extends Controller 
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            
            if (!Auth::check()) 
            {
                return redirect("/");
            }
            else
            {
                $user=Auth::user();

                if($user->role==2)
                {
                    return $next($request);
                }
                else 
                {
                    return redirect("/home");
                }
         }
        });
    }


         public function getUsers()

            {   
                $user = Auth::user();
                $users = User::all();

                return view("users",

                    [
                        "user"  => $user,
                        "users" => $users,
                    ]

             );
            }

            public function getEditUser($id)

            {
                $user = user::where("id", $id)
                    ->first();


             return view("edit_user",
                   [ 
                    "user" =>$user,
                    ]       

            );
            }

             public function postEditUser($id, Request $request)
             {

                $rules =
                [                    
                    'email'    => 
                    [ 
                     'required',
                     'email',
                     Rule::unique('users')->ignore($id)
                    ]
                ];

                $validation = \Validator::make( $request->all(), $rules );

                if ( $validation->fails() ) 
                {
                    return redirect()->back()->withErrors($validation->errors())->withInput();
                }


            $user = User::where('id', $id)
                            ->first();
            $user->email=$request->email;
            $user->preffered_working_hours=$request->preffered_working_hours;
            $user->save();

            return redirect("/admin/users");

        }

          public function getDeleteUser($id)
        {


            $user = User::where('id', $id)->first();
            $works = $user->works;
            if($user->role==2)
            {           
              return redirect('/admin/users');
            } 
            else
            { 
                foreach ($works as $work) 
                {
            
                     $work->delete();
                }

                    $user->delete();
            }
        
            return redirect('/admin/users');
        }








 }

 
