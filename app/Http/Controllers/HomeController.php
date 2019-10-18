<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Work;
use Image;
use Storage;
use App\Project;
use App\UserProject;

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
        $projects=Project::all();
        $users=User::all();

        return view('home',
            [
                "projects" =>$projects,
                "user" => $user,
                "users" => $users
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

    public function getTask($id){

         $user= Auth::user();
         $project=Project::where('id', $id)->first();
       return view("task",
            [
                "user" => $user,
                "project" => $project
            ]
             ); 
         
        }


      function postWork($id, Request $request) 
    {   
        $user= Auth::user();
        $work= new Work();
        $work->type_of_work=$request->type_of_work;
        $work->worked_hours=$request->worked_hours;
        $work->user_id=$user->id;
        $work->date=$request->date;
        $work->project_id=$id;


        
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
                "user" => $user,
                "works" => $works_array,
                "preffered_hours" => $preffered
            ]
        );

    }

     public function getProfile()
    {
        $user=Auth::user();
        return view("profile",
            [ 
            "user" => $user,
            ]
    );
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

        return redirect("preffered");
          }

   
         }




     public function getTableTasks(){

       
        $user = Auth::user();
        $works = $user->works;


        return view("table_tasks",
            [
                "works" => $works,
                "user" => $user,
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
                    $user=Auth::user();
                    $work = Work::where('id', $id)
                            ->first();

                    return view("edit",

                        [
                            "work" => $work,
                            "user" => $user,
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


        public function getProfilePicture()
        {
                $user=Auth::user();
               return view("change_profile_picture",
            [ 
            "user" => $user,
            ]
    );
        }

        public function postProfilePicture(Request $request)
        {
            $file=$request->file("pic");
            $user= Auth::user();

            // returns \Intervention\Image\Image - OK
            $image = Image::make($file);


            $hash="slika_".$user->id;

            // use hash as a name
            $path = "images/".$hash.".jpg";

            // save it locally to ~/public/images/{$hash}.jpg
            $image->save(public_path($path));

            $url = "/" . $path;
            $user->profile_picture=$url;
            $user->save();

            return redirect ("/home");
         }

         public function getProject()
            {
                $user=Auth::user();
                return view('project',
                    [
                        "user" => $user,
                    ]

            );
            }


            public function postProject(Request $request){

            $user=Auth::user();
            $project=new Project();
            $project->name=$request->name_of_project;
            $project->user_id=$user->id;
            $project->save();

            return redirect("/home");

        }


             public function getOpenProject($id)
                {
                    $user=Auth::user();
                    $works=Work::where('project_id', $id)
                            ->get();
                    $project=Project::find($id);
                    $id_users=array_flatten(UserProject::select("user_id")->where('project_id', $id)->get()->toArray());

                    $users=User::where('id', '!=', $user->id)->whereNotIN("id", $id_users)->get();
                    $project_users=UserProject::where('project_id', $id) ->get();

                    if($user->id==$project->user_id||$user->role==2)
                    { 
                    return view('open_project',
                        [   
                            "users" =>$users,
                            "user" => $user,
                            "works" => $works,
                            "project" => $project,
                            "id_users" => $id_users,
                            "project_users" => $project_users
                        ]

                );
                    }
                    else return redirect('/home');
                }


                       
             public function getDeleteProject($id)
        {

            $project = Project::find($id);
            $user = Auth::user();
            $works = $user->works;
            if($user->id==$project->user_id||$user->role==2)
                    { 
           
                foreach ($works as $work) 
                {
            
                     $work->delete();
                }

                    $project->delete();
                    
        }
         
         return redirect()->back();
        }

         public function getEditProject($id)
                {
                    $user=Auth::user();
                    $project = Project::where('id', $id)
                            ->first();
                if($user->id==$project->user_id||$user->role==2)
                    { 

                    return view("edit_project",

                        [
                            "project" => $project,
                            "user" => $user,
                        ]


                );
                     }
                     return redirect()->back();

                }

         public function postEditProject($id, Request $request){

            $project = Project::where('id', $id)
                            ->first();
            $project->name= $request->project_name;
            $project->save();

            return redirect("/home");

        }

         public function postAddUser($id, Request $request){

            $user= new UserProject();
            $user->user_id=$request->add_user;
            $user->project_id=$id;
            $user->save();


            return redirect("/open_project/".$id);

        }


         public function getKickUser($id)
        {


            $user_project = UserProject::where('id', $id)->first();


            if($user_project->user_id!=$user_project->project->user_id)
            {           
                 $user_project->delete();
              
            } 
          
        
            return redirect()->back();
        }


 }

 
