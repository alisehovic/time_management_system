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

    	<form method="post" action="/task/{{$project->id}}">

        <h2>task</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="type_of_work"><b>Type of work</b></label>
        <input class="login" type="text" placeholder="Enter type of work" name="type_of_work" required> <br /> 
         <label for="type_of_work"><b>Worked hours</b></label>
        <input class="login" type="text" placeholder="Enter number of worked hours" name="worked_hours" required> <br /> 
         <label for="date"><b>Date</b></label>
        <input class="login" type="date" placeholder="Enter date" name="date" required> <br /> 


            <button class="tipka" type="submit">Submit</button>

    	<form/>
    </body>
</html>


