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
        
       <div class="container"  >
       <h3 class="text-center font-weight-bolder">Password Resset</h3>
       <p>
           Kindly follow the link to change your password
           This link will expire in 10 minutes
       <h5>{{$details['link']}}</h5>
     </p>
      
       </div>


        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
    </html>