@extends('dashboard.layout')

@section('main')
    <div class="container relative mx-auto" id="icons">
        @include('layouts.alert')
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <h3 class="text-center">Add An Icon</h3>
               
                <div class=" w-full flex justify-center">
                   
                <form class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/dashboard/icons')}}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            <div class=" border-b border-green-500 py-2 mb-4">
                        
                                <input type="text" name="icon_name" id="icon_name"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Icon Name" required>
                            </div>
                
                            <div class="border-b border-green-500 py-2 mb-4 ">
                               
                                <select class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" name="icontype_id" id="icontype_id" required>
                                    <option value="">select icon type</option>
                                    @foreach ($icontypes as $item)
                                <option value="{{$item->id}}">{{$item->type}}</option>
                                    
                                    @endforeach
                                    
                                  </select>
                            </div>
                            <div class="border-b border-green-500 py-2 mb-4 ">
                                <label class="block capitalize tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-zip">
                                    Pick an Icon
                                  </label>
                                <input type="file" name="icon_path" id="icpn_path"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Icon Path" required>
                            </div>
                            <div class=" flex flex-wrap text-center ">
                                <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Add icon
                                </button>
                              
                            </div>
                            
                        </form>
                    </div>
               
            </div>

          
            


        </div>
    </div>
@endsection

