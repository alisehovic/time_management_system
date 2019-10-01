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

        <h2>Done tasks table</h2>
       <table style="width:100%;  ">
              <tr>
                <th>Type of work</th>
                <th>Worked hours</th> 
                <th>Date</th>
                <th>Action</th>
              </tr>
              @foreach($works as $work)

                <tr style="height: 50px">
                    <td>
                     {{$work->type_of_work }}
                     </td>
                    <td>
                    {{$work->worked_hours }}
                    </td>
                    <td>
                    {{$work->date }}

                    </td>
                    <td><a href="/edit/{{$work->id}}" class="tipka">Edit</a><a href="/table-tasks/delete/{{$work->id}}" class="tipka">Delete</a></td>


                </tr>
              @endforeach
        </table>
        


         <a href="/home"><button class="tipka">Back</button></a>

    </body>
</html>


