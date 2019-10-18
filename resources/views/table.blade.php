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

         @include("_menu")

        <h2>Done tasks table</h2>
        <h3>Preffered hours: {{ $preffered_hours }}<h3/>
       <table style="width:100%;  ">
              <tr>
                <th>Type of work</th>
                <th>Worked hours</th> 
                <th>Date</th>
              </tr>
              @foreach($works as $date => $work)
              @if ($preffered_hours <= $work["sum"])
                <tr style="background-color: green">
              @else                 
                <tr style="background-color: red">
              @endif
                    <td>
                        <ul>
                        @foreach($work["type_of_work"] as $task)
                            <li>
                                {{ $task }}
                            </li>
                        @endforeach
                    </ul>
                    </td>
                    <td>
                        {{ $work["sum"] }}
                    </td>
                    <td>
                        {{ $date }}
                    </td>
                </tr>
              @endforeach
        </table>
        <form method="get">

        <label for="date"><b>Filter from Date</b></label>
        <input class="login" type="date" placeholder="Enter date" name="date1" required> <br /> 
        <label for="date"><b>To Date</b></label>
        <input class="login" type="date" placeholder="Enter date" name="date2" required> <br /> 
        <button class="tipka" type="submit">Submit</button> <br/>

        </form>


         <a href="/home"><button class="tipka">Back</button></a>

    </body>
</html>


