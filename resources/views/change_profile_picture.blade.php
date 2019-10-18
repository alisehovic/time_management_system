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

    	
        <h2>Change profile picture</h2>

        <form action="/change-profile-picture" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="file" name="pic"  >
          <input type="submit">
        </form>
        




    </body>
</html>


