@extends('dashboard.layout')

@section('main')
 <div class="container mx-auto">
    <h3 class="text-center font-bold text-xl">Add theme</h3>
    @include('layouts.alert')
    <div class=" w-full lg:w-6/12 flex justify-center">
       
        <form  class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/dashboard/themes')}}" method="POST">
            @csrf
        
            <div class=" border-b border-orange-500 py-2 mb-4">
                
                <input type="text" name="background_color" id="background_color"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                 placeholder="background color"   required>
            </div>

            <div class=" border-b border-orange-500 py-2 mb-6">
                
                <input type="text" name="text_color" id="text_color"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                placeholder="text color"  required>
            </div>
            <div class=" flex flex-wrap text-center ">
                <button class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                    Add Theme
                </button>
              
            </div>
            
        </form>
       
        </div>
         
    </div>
   
    
@endsection