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
        <form method="post" action="/profile">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1> Change your password<h1/>

    	   <label for="psw"><b> Old Password</b></label>
            <input class="register" type="password" placeholder="Enter Password" name="oldpsw" required> <br />
            <label for="psw"><b> New Password</b></label>
            <input class="register" type="password" placeholder="Enter Password" name="password" required> <br />
            <label for="psw"><b> Confirm  new Password</b></label>
            <input class="register" type="password" placeholder="Enter Password" name="password_confirmation" required> <br />
            <button class="tipka" type="submit">Change password</button>

            <div class="container">
             @if(isset($error_response) || isset($oldpassword_error))
                         <h4>Errors:</h4>
                         <ul>
                  @foreach($error_response as $error)
                  
                    <li> {{ $error }}</li>
                  
                  @endforeach
                  @if(isset($oldpassword_error))
                  
                    <li>{{ $oldpassword_error }}</li>


                  @endif
                  </ul>
             @endif
  </div>
    

        </form>
    </body>
</html>


