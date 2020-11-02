<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TwineLink</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        
    </head>
    <body>
        
       <div class="container">
       <h3 class="text-center font-weight-bolder">{{$details['title']}}</h3>
       <p>
           {{$details['msg']}}
     </p>
       
    <p>Name:{{$details['name']}}</p>
    
    

       </div>


        
    </body>
    </html>