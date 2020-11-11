@extends('dashboard.layout')

@section('main')
    <div class="container relative mx-auto" id="icons">
        @include('layouts.alert')
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <h3 class="text-center">Edit  Link</h3>
               
                <div class=" w-full flex justify-center">
                   
                <form class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/dashboard/icons/'.$icon->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            
                            <div class=" border-b border-green-500 py-2 mb-4">
                        
                            <input type="text" name="icon_name" id="icon_name"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Icon Name" value="{{$icon->icon_name}}" required>
                            </div>
                
                            <div class="border-b border-green-500 py-2 mb-4 ">
                                
                                <select class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" name="icontype_id" id="type">
                                <option value="{{$icon->icontype_id}}">{{$icon->icontype->type}}</option>
                                @foreach ($icontypes as $item)
                                <option value="{{$item->id}}">{{$item->type}}</option>
                                    
                                    @endforeach
                                    
                                  </select>
                            </div>
                            <div class="border-b border-green-500 py-2 mb-4 ">
                                <img src="{{$icon->icon_path}}" alt="" >
                                <input type="file" name="icon_path" id="icon_path"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"  placeholder="Icon Path" >
                            </div>
                            <div class=" flex flex-wrap text-center ">
                                <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Update icon
                                </button>
                              
                            </div>
                            
                        </form>
                    </div>
               
            </div>

          
            


        </div>
    </div>
@endsection

