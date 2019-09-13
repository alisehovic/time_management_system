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
        return view('home');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getPrefferedWorkingHours()
    {
        return view ("preffered");
    }

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
        $work= new work();
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
    

        return view("table",
            [
                "works" => $works,
                "preffered_hours" => $preffered
            ]
        );

    }

}


