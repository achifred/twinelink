@extends('layouts.authlayout')

@section('content')
@include('layouts.authnav')
<div class="container mx-auto ">
    
    @include('layouts.alert')

    <div class=" top-0 w-full h-full bg-white"
    style="background-image:url( {{URL::asset('img/social.svg')}}); background-size: 100%; background-repeat: no-repeat;">
        <div class="w-full max-w-xs mx-auto">
            <form class="bg-white rounded shadow px-8 pt-6 pb-8 mb-4 mt-40" action="{{URL::to('/me')}}" method="POST">
                @csrf
                    <h3 class="text-center  font-bold text-gray-700">Sign In</h3>
                    <div class=" border-b border-orange-600 py-2 mb-4">
                      
                        <input type="email" name="email" id="email" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="email" required>
                    </div>
        
                    <div class=" border-b border-orange-600 py-2 mb-6">
                        
                        <input type="password" name="password" id="password" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Password" required>
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
    </div>
@endsection