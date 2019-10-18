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

    	<form method="post" action="/edit_project/{{$project->id}}">

        <h2>edit project</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <label for="project"><b>New project name</b></label>
        <input class="login" type="text" value="{{$project->name}}" name="project_name" required> <br />
         <div class="container">
         </div>
        <button class="tipka" type="submit">Submit</button>

    	<form/>
    </body>
</html>


