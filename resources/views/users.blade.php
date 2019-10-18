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


        <h2>Users table</h2>
       <table style="width:100%;  ">
              <tr>
                <th>Id</th>
                <th>Email</th> 
                <th>Preffered hours</th>
                <th>Role</th>
                <th>Profile picture</th>


              </tr>
              @foreach($users as $user)

                <tr style="height: 50px">
                    <td>
                     {{$user->id }}
                     </td>
                    <td>
                    {{$user->email }}
                    </td>
                    <td>
                    {{$user->preffered_working_hours }}

                    </td>
                    <td>
                      @if ($user->role == 1) 
                       User                    
                      @else 
                      Admin
                    
                      @endif

                    </td>
                    <td> 
                      @if (is_null($user->profile_picture))
                      <img src="/images/default.png" width="100" height="100">
                      @else

                      <img src="{{ $user->profile_picture }}" width="100" height="100">

                      @endif
                    </td>

                    <td>
                      <a href="/admin/edit_user/{{$user->id}}" class="tipka">Edit</a>
                      @if ($user->role==1)
                         <a href="/admin/users/delete/{{$user->id}}" class="tipka">Delete</a>
                      @endif
                    </td>


                </tr>
              @endforeach
        </table>
        


         <a href="/home"><button class="tipka">Back</button></a>

    </body>
</html>


