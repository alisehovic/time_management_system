 <!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Time managment system </title>

        <!-- Fonts -->        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>
        <form method="post" action="/preffered">
        <h2>Preffered working hours:</h2>
        <input  type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="text" placeholder="Enter preffered working hours" name="preffered" required> <br /> 
              <button class="tipka" type="submit">Submit</button>
        </form>

    </body>
</html>