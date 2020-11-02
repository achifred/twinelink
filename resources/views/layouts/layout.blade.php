<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>
</head>
<body>
    @yield('content')

    <script src="{{ URL::asset('js/app.js') }}" ></script>
    <script>
        function closeAlert(event){
          let element = event.target;
          while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
          }
          element.parentNode.parentNode.removeChild(element.parentNode);
        }
      </script>
    @yield('script')
</body>
</html>