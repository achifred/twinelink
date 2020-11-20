@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="icons">
        @include('layouts.alert')
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <h3 class="text-center">Edit  Tittle</h3>
               
                <div class=" w-full flex justify-center">
                   
                <form class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/admin/url/tittle/'.$tittle->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            
                        <div class=" border-b border-green-500 py-2 mb-4">
                        
                        <input type="text" name="tittle" id="tittle"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" value="{{$tittle->tittle}}" required>
                        </div>
                        <div class=" border-b border-green-500 py-2 mb-4 ">
                            <label for="cover_art">Select Cover art Image</label>
                        <img src="{{$tittle->cover_art}}"   alt="" class="rounded align-middle h-20 w-20">
                            <input type="file" name="cover_art" id="cover_art"     class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" >
                            
                        </div>

                        <!--div class=" border-b border-green-500 py-2 mb-4 ">
                            <label for="preview">Pick  a preview</label>
                            <input type="file" name="preview" id="preview" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" >
                            
                        </div-->
                
                           
                           
                            <div class=" flex flex-wrap text-center ">
                                <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Update Tittle
                                </button>
                              
                            </div>
                            
                        </form>
                    </div>
               
            </div>

          
            


        </div>
    </div>
@endsection

