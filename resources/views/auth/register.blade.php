@extends('layouts.authlayout')

@section('content')
@include('layouts.authnav')
<div class="container mx-auto mt-20">
    <h3 class="text-gray-700 font-bold text-center capitalize text-2xl ">Create A TwineLink Account for free</h3>
    @include('layouts.alert')
    <div class=" w-full lg:w-1/3 md:w-2/4 mx-auto">
    <form class="bg-white rounded shadow px-8 pt-6 mt-8 mb-4 " action="{{URL::to('/register')}}" method="POST">
       @csrf
        

        
        <div class=" border-b border-orange-600 py-2 mb-4">
            
            <input type="email" name="email" id="email" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Email Address">
        </div>
        <div class=" border-b border-orange-600 py-2 mb-4">
            
            <input type="text" name="username" id="username" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Username">
        </div>
        

        <div class="border-b border-orange-600 py-2 mb-4">
            
            <input type="password" name="password" id="password" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Password">
        </div>
        
       
        
        <div class="flex justify-center ">
            
                <button class="bg-orange-600 hover:bg-teal-800 text-white font-bold py-2 px-4 mb-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign Up
                </button>
            <a class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-500 px-4 py-2" href="{{URL::to('/login')}}">
                Already have an acocount? Log in
            </a>
              
        </div>

       </form>
    </div>
    <div class="flex justify-center mx-auto">
        <a class="inline-block text-center align-baseline font-bold italic text-gray-700 py-3 px-4 hover:text-gray-500" href="#">
            <small>By creating an account you have agreed to the terms and conditions of this platform</small>
          </a>
    </div>
</div>
@endsection