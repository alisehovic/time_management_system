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

    	<form method="post" action="/project">

        <h2>Projects</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <label for="name_of_project"><b>Name</b></label>
            <input class="login" type="text" placeholder="Enter name of the project" name="name_of_project" required> <br /> 
         
        
        <button class="tipka" type="submit">Submit</button>

    	<form/>
    </body>
</html>


