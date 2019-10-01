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
    	<form method="post" action="/admin/edit_user/{{$user->id}}">

        <h2>edit user</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <label for="type_of_work"><b>Email</b></label>
         @if (old("email"))    
            <input class="login" type="text" value="{{old('email')}}" name="email" required> <br/> 
         @else
            <input class="login" type="text" value="{{$user->email}}" name="email" required> <br /> 
        @endif
         <label for="date"><b>Preffered working hours</b></label>
        <input class="login" type="number" value="{{$user->preffered_working_hours}}" name="preffered_working_hours" required> <br />
         <div class="container">
               {{ $errors->first() }}
         </div>
        <button class="tipka" type="submit">Submit</button>

    	<form/>
    </body>
</html>


