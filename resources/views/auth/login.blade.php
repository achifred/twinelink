@extends('layouts.authlayout')
@include('layouts.authnav')
@section('content')

<div class="container mx-auto ">
  
   
    <h3 class="mt-20 text-center text-gray-700 font-bold text-xl">Login to your TwineLink Dashboard </h3>
    <div class=" w-full lg:w-6/12 container mx-auto flex justify-center">
      
            <form class="bg-white rounded shadow px-8 pt-6 pb-8 mb-4 mt-8" action="{{URL::to('/login')}}" method="POST">
                @csrf
                @include('layouts.alert')
                    <h3 class="text-center  font-bold text-gray-700">Sign In</h3>
                    <div class=" border-b border-orange-600 py-2 mb-4">
                      
                        <input type="text" name="username" id="username" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="username" required>
                    </div>
        
                    <div class=" flex items-center border-b border-orange-600 py-2 mb-6">
                        
                        <input type="password" name="password" id="password" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Password" required>
                        <button onclick="togglePasswordVisibility()" class="flex-shrink-0 bg-gray-600 hover:bg-teal-700  hover:border-teal-700 text-sm  text-white py-1 px-2 rounded" type="button">
                            <i class="fa fa-eye"></i>
                          </button>
                    </div>
                    <div class=" flex flex-wrap text-center ">
                        <button class="bg-orange-500 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Sign In
                        </button>
                    <a class="inline-block align-baseline font-bold text-sm text-gray-700 py-3 px-4 hover:text-gray-500" href="{{URL::to('/reset')}}">
                            Forgot Password?
                          </a>
                    </div>
                    
                </form>
        </div>
        <div class="flex justify-center mx-auto">
            <a class="inline-block text-center align-baseline font-bold text-lg text-gray-700 py-3 px-4 hover:text-gray-500" href="{{URL::to('/register')}}">
                Don't have an account? <span><u>Create One</u></span>
              </a>
        </div>
        
        <div class="flex justify-center">
          <a class="text-gray-600 hover:text-gray-800  px-3 py-4 lg:py-2 flex items-center text-base text-center capitalize font-bold"
              href="{{ URL::to('/about') }}">
             <u> about us</u>
          </a>
          
          <a class="text-gray-600 hover:text-gray-800  px-3 py-4 lg:py-2 flex items-center text-base text-center capitalize font-bold"
              href="{{ URL::to('/') }}">
             <u> home</u>
          </a>
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