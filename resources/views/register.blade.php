
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
    <input class="register" type="text" placeholder="Enter email" name="email" > <br />
    <label for="psw"><b>Password</b></label>
    <input class="register" type="password" placeholder="Enter Password" name="password" > <br />
    <label for="psw"><b> Confirm Password</b></label>
    <input class="register" type="password" placeholder="Enter Password" name="password_confirmation" > <br />
    <label for="city"><b> City</b></label>
    <input class="register" type="text" placeholder="Enter city" name="city" > <br />
    
    <label for="country"><b> Country</b></label>
    <select class="register" name="country">    
    @foreach ($countries as $country)
    @if($country->id ==26)
    <option value="{{ $country->id }}" selected="selected">
    {{ $country->name }}
    </option>
    @else
    <option value="{{ $country->id }}" >
    {{ $country->name }}
    </option>
    @endif
    @endforeach
    </select> <br />
    
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
