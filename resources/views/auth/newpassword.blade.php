@extends('layouts.authlayout')

@section('content')
@include('layouts.authnav')
<div class="container mx-auto ">
    
    @include('layouts.alert')

    <div class=" top-0 w-full h-full bg-white"
    style="background-image:url( {{URL::asset('img/login.png')}}); background-size: 100%; background-repeat: no-repeat;">
        <div class="w-full max-w-xs mx-auto">
            <form class="bg-white rounded shadow px-8 pt-6 pb-8 mb-4 mt-40" action="{{URL::to('/resetpassword')}}" method="POST">
                @csrf
                    <h3 class="text-center  font-bold text-gray-700">Reset Password</h3>
                    <div class=" border-b border-orange-600 py-2 mb-4">
                      
                        <input type="email" name="email" id="email" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="email" required>
                    </div>
        
                    <div class=" flex items-center border-b border-orange-600 py-2 mb-6">
                        
                        <input type="password" name="password" id="password" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Password" required>
                        <button onclick="togglePasswordVisibility()" class="flex-shrink-0 bg-gray-600 hover:bg-teal-700  hover:border-teal-700 text-sm  text-white py-1 px-2 rounded" type="button">
                            <i class="fa fa-eye"></i>
                          </button>
                    </div>
                    <div class=" flex flex-wrap text-center ">
                        <button class="bg-orange-500 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Reset Password
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-gray-700 py-3 px-4 hover:text-gray-500" href="{{URL::to('/register')}}">
                            Don't have an account? Create Account
                              </a>
                    </div>
                    
                </form>
            </div>
    </div>
    <script>
        function togglePasswordVisibility() {
      var input = document.getElementById("password");
      if (input.type === "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    }
    </script>
@endsection