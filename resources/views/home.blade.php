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
    	
        <h2>Home</h2>
        <a href="/preffered"><button class="tipka">Set preffered working hours</button></a>
   		<a href="/logout"><button class="tipka">Logout</button></a>
    	<a href="/task"><button class="tipka">Napisi sta si uradio</button></a>
    	<a href="/table"><button class="tipka">Lista uradjenog posla ikad</button></a>
        <a href="/profile"><button class="tipka">Profile</button></a>
        <a href="/table-tasks"><button class="tipka">Table</button></a>
        @if ($user->role==2) 
        <a href="/admin/users"><button class="tipka">Users</button></a>
        @endif




    </body>
</html>


