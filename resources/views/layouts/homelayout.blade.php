<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TwineLink</title>
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('icon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>
</head>
<body>
  @include('layouts.navbar')
    @yield('content')

    <script src="{{ URL::asset('js/app.js') }}" ></script>
    <script>
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
      }
    </script>
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