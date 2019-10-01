
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
 <form method="post" action="/register">
        <h2>Register Form</h2>

  <div class="container">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="email"><b>Email</b></label>
    <input class="register" type="text" placeholder="Enter email" name="email" required> <br />
    <label for="psw"><b>Password</b></label>
    <input class="register" type="password" placeholder="Enter Password" name="password" required> <br />
    <label for="psw"><b> Confirm Password</b></label>
    <input class="register" type="password" placeholder="Enter Password" name="password_confirmation" required> <br />
        
    <button class="tipka" type="submit">Register</button>
  </div>

  <div class="container">
     @if(isset($error_response))
                 <h4>Errors:</h4>
                 <ul>
          @foreach($error_response as $error)
          
            <li> {{ $error }}</li>
            
          
           


          @endforeach
          </ul>
     @endif
  </div>
</form>
    </body>
</html>
