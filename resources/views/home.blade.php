 <!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Time managment system </title>

        <!-- Fonts -->        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>
        @include("_menu")

          <h2>Projects</h2>
       <table style="width:100%;  ">
              <tr>
                <th>Name of the project</th>
                <th>Project admin</th>
                <th>Action</th>
              </tr>
              @foreach($projects as $project)
                   @if ($user->role==2||$project->user_id==$user->id)
                <tr style="height: 50px">
                    <td>
                        
                            {{$project->name }}

                       
                     </td>
                      <td>
                          {{ $project->admin_user->email }}
                       
                     </td>

                    <td>
                        <a href="/open_project/{{$project->id}}" class="tipka">Open</a>
                        <a href="/edit_project/{{$project->id}}" class="tipka">Edit</a>
                        <a href="/home/{{$project->id}}" class="tipka">Delete</a>                  
                    </td>
                </tr>
              @endif
                 @endforeach


               
          


    </body>
</html>


