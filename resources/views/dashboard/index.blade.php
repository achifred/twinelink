@extends('dashboard.layout')

@section('main')

<div class="container mx-auto">
    <div class="block lg:flex flex-wrap justify-center mt-5 ">
        <div class=" w-full lg:w-6/12 xl:w-3/12  px-4 py-6  ">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl ">
                <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Users</h5>
               
                <div class=" flex px-6 py-2 ">
                   <div>
                    <i class="fa fa-arrow-down fa-2x text-teal-700 "></i>
                    <i class="fa fa-coins  text-teal-700 "></i>
                   </div>
                <p class="text-gray-700  text-base mb-4 px-4">{{$total_users}}</p>
                </div>
            </div>
        </div>
        <div class=" w-full lg:w-6/12 xl:w-3/12 px-4 py-6  ">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl ">
                <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Users Today</h5>
               
                <div class=" flex px-6 py-2">
                  <div>
                    <i class="fa fa-arrow-up fa-2x text-pink-700 "></i>
                    <i class="fa fa-coins text-pink-700 "></i>
                  </div>
                    <p class="text-gray-700  text-base mb-4 px-4">{{$today_register_users}}</p>
                </div>
            </div>
        </div>
        <div class=" w-full lg:w-6/12 xl:w-3/12 px-4 py-6  ">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl hover:bg-cool-gray-900 hover:text-white">
                <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Links Created</h5>
        
                <div class=" flex px-6 py-2">
                    <i class="fa fa-arrow-down fa-2x text-green-900"></i>
                <p class="text-gray-700 text-base mb-4 px-4">{{$total_links_created}}</p>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4 py-6  ">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl hover:bg-purple-900">
                <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Links Created Today </h5>
                <div class="flex px-6 py-2">
                    
                    <i class="fa fa-arrow-up fa-2x text-orange-900 "></i>
                <p class="text-gray-700  text-base mb-4 px-4">{{$total_links_created_today}}</p>
                </div>
            </div>
        </div>
        
       
        
       </div>
</div>
    
@endsection