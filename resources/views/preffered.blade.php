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

        <a href="/change-profile-picture">
            <div class="image" style="background-image: url('{{ $user->profile_picture }}')" >
            </div>
        </a>
        <form method="post" action="/preffered">
        <h2>Preffered working hours:</h2>
        <input  type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="text" value="{{ $user->preffered_working_hours }}" name="preffered" required> <br /> 
              <button class="tipka" type="submit">Submit</button>
        </form>
         <a href="/home"><button class="tipka">Back</button></a><br>


        <a href="/profile">Change password?</a>

    </body>
</html>