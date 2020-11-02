@extends('dashboard.layout')

@section('main')
 <div class="container mx-auto">
  <div class="flex justify-end">
    <a class="bg-orange-600  uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 float-right " href="{{URL::to('/dashboard/themes/create')}}">Add Theme</a>
    </div>
        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
              
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow rounded">
                <div class="px-4 py-5 flex-auto">
                  <div class="tab-content tab-space">
                    <div class="block overflow-x-auto" id="tab-all">
                        <table class="overflow-x-auto ">
                            <thead class="">
                                
                                <th class="w-1/6 px-4 py-2 font-normal">Background Color</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Text Color</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Action</th>

                                 
                            </thead>
                            <tbody>
                                @foreach ($themes as $item)
                                <tr class="">
                                  
                                  <td class="px-4 py-2 text-center font-light" style="background:{{$item->background_color}}">
                                     <button class="font-bold" >{{$item->background_color}}</button> 
                                  </td>
                                  <td class="px-4 py-2 text-center font-light" style="background:{{$item->text_color}}">
                                    <button class="font-bold" >{{$item->text_color}}</button> 
                                 </td>
                                 <td class="px-4 py-2 text-center font-light">
                                    <div class="flex flex-wrap">
                                    <a href="{{URL::to('/dashboard/themes/'.$item->id)}}" class="mr-2"><i class="fa fa-edit"></i></a>
                                        <a href="{{URL::to('/dashboard/themes/delete/'.$item->id)}}" class="text-red-600"><i class="fa fa-trash"></i></a>
                                    </div>
                                 </td>
                                 
                                 
                              </tr>
                                @endforeach
                            </tbody>
                           </table>
                           <div>
                             {{$themes->links()}}
                           </div>
                    </div>


                  
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
         
    </div>
   
    
@endsection