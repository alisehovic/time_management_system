<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Work;


class HomeController extends Controller 
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
                return $next($request);
            }
        });
    }

    public function getHome()
    {
        $user=Auth::user();
        return view('home',
            [
                "user" => $user,
            ]

    );
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getPrefferedWorkingHours()
    {
        $user= Auth::user();

        return view("preffered",
            [
                "user" => $user,
            ]
        );    }

    function postPreffered(Request $request) 
    {
        $user = Auth::user();
        $user->preffered_working_hours=$request->preffered;
        $user->save();
        return redirect("/home");
    }

    public function getTask(){
        return view("task");
    }

      function postWork(Request $request) 
    {
        $user= Auth::user();
        $work= new Work();
        $work->type_of_work=$request->type_of_work;
        $work->worked_hours=$request->worked_hours;
        $work->user_id=$user->id;
        $work->date=$request->date;

        
        $work->save();
        return redirect("/home");
    }

    public function getTable(Request $request){

        $user = Auth::user();
        $preffered= $user->preffered_working_hours;
        $works_array = [];


        if(isset($request->date2) && isset($request->date1))
        {
             $works = Work::where('user_id', $user->id)
                        ->where ("date", ">=" , $request->date1)
                        ->where ("date", "<=" , $request->date2)

                  ->get();

        } 
        else   
         {   
          $works = Work::where('user_id', $user->id)
                  ->get();

         }

         foreach($works as $work)
         {
            if(isset($works_array[$work->date]))
            {
                $works_sub_array = $works_array[$work->date]["type_of_work"];
                array_push($works_sub_array, $work->type_of_work);
                $works_array[$work->date]["type_of_work"]=$works_sub_array;
                $works_array[$work->date]["sum"]=$works_array[$work->date]["sum"]+$work->worked_hours;
            }
            else
            {
                $works_array[$work->date]["type_of_work"]=[$work->type_of_work];
                $works_array[$work->date]["sum"]=$work->worked_hours;
            }
         }

        return view("table",
            [
                "works" => $works_array,
                "preffered_hours" => $preffered
            ]
        );

    }

     public function getProfile()
    {
        return view("profile");
    }


     public function postProfile(Request $request)
    {
          
              $rules = [
        'password' => [
            'required',
            'min:8',
            'confirmed',
        ],
    ];

    $validation = \Validator::make( $request->all(), $rules );
            $user= Auth::user();

    if ( $validation->fails() || !Hash::check($request->oldpsw, $user->password)) {
                $errors=[];
                 if( !Hash::check($request->oldpsw, $user->password)){
                        $errors["oldpassword_error"]= "old password is wrong";

                }
                if($validation->fails()){
                     $errors["error_response"]= $validation->errors()->all();


                }  

        return view("profile", $errors);


    } else {
               
                $user->password = Hash::make($request->password);
                $user->save();

        return redirect("home");
          }

   
         }




     public function getTableTasks(){

       
        $user = Auth::user();
        $works = Work::where('user_id', $user->id)
                          ->get();


        return view("table_tasks",
            [
                "works" => $works,
            ]
        );

    }

        public function getDeleteTask($id)
        {

            $work = Work::where('id', $id)->first();
            $work->delete();


            return redirect('table-tasks');
        }

        public function getEdit($id)
                {
                    $work = Work::where('id', $id)
                            ->first();

                    return view("edit",

                        [
                            "work" => $work,
                        ]


                );
                }

        public function postEdit($id, Request $request){

            $work = Work::where('id', $id)
                            ->first();
            $work->type_of_work= $request->type_of_work;
            $work->worked_hours=$request->worked_hours;
            $work->date=$request->date;
            $work->save();

            return redirect("/table-tasks");

        }

       







 }

 
