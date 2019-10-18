 <!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="/js/main.js"></script>


        <title>Time managment system </title>

        <!-- Fonts -->        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>

        @include("_menu")


        <h2>Done tasks table</h2>
       <table style="width:100%;  ">
              <tr>
                <th>Type of work</th>
                <th>Worked hours</th> 
                <th>Date</th>
                <th>Done by:</th>
                <th>Action</th>
              </tr>
              @foreach($works as $work)

                <tr style="height: 50px">
                    <td>
                     {{$work->type_of_work }}
                     </td>
                    <td>
                    {{$work->worked_hours }}
                    </td>
                    <td>
                    {{$work->date }}

                    </td>
                     <td>
                    {{$user->email }}

                    </td>

                    <td><a href="/edit/{{$work->id}}" class="tipka">Edit</a><a href="/table-tasks/delete/{{$work->id}}" class="tipka">Delete</a></td>


                </tr>
              @endforeach
        </table>
        

        <a href="/task/{{$project->id}}"><button class="tipka">Add new task</button></a><br />
                <form method="post" action="/open_project/add-user/{{$project->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <label for="add_user"><b> Add user to this project</b></label>
                <select class="user_select" name="add_user">    
                @foreach ($users as $user)

                <option value="{{ $user->id }}" >

                               {{ $user->email }}
                
                </option>
                
                @endforeach
                </select> <br />

                <button class="tipka" type="submit">Add</button><br />
            </form>
  

        <a href="/home"><button class="tipka">Back</button></a>

        <h2>Users on this project</h2>
       <table style="width:100%;  ">
            <tr>
                <th>Email</th> 
                <th>Action</th> 
                
             </tr>

             <tr>
                <td style="height: 50px">{{ $project->admin_user->email }}</td> 
                
             </tr>
            @foreach($project_users as $project_user)
             <tr style="height: 50px">
                    
                    <td>
                       {{ $project_user->user->email}}
                    </td>
                    <td>
                     <a href="/open_project/kick/{{$project_user->id}}" class="tipka">Kick user</a>                  
                    </td>
                   

            </tr>
           
            @endforeach
        </table>

    </body>
</html>


