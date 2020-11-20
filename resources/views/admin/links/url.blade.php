@extends('layouts.layout')
@section('title')
{{$tittle}}|TwinedLink
@endsection

@section('content')


    <div class="contaniner mx-auto  min-h-screen"  style="background:{{$background_color}}" id="url">
        <div class="block lg:flex flex-wrap ">

               
                <div  class="w-full border-l-4 border-green-600 shadow-xl h-auto lg:mt-5  rounded-lg mb-2 ml-auto mr-auto lg:w-3/12" style="background:{{$background_color}}" >
                    @foreach ($links as $item)
                    <div class="relative flex flex-col justify-center">
                        
                    <div class=" w-full h-64  bg-center bg-cover bg-no-repeat" style="background-image:url({{URL::to($item->cover_art)}})">
                            <div class=" flex justify-center text-center ">
                                
                            </div>
                        </div>
                         
                         <div class="h-16 bg-white w-full">
                         <h4 class="text-center text-gray-600 pt-2">{{$username}} - {{$item->tittle}}</h4>
                            <h4 class="text-xs text-gray-500 text-center">Stream from your preferred platform</h4>
                         </div>
                    </div>
                    <div class="flex flex-col text-center pt-6 ">
                    <div class="container mx-auto ">
                        @foreach ($item->urls as $url)
                        
                            <div class=" flex  justify-between px-4 py-2 border-b-4 w-10/12 mx-auto border-green-600 rounded  mb-4 " style=" background-color:{{$text_color}};color:{{$background_color}};">
                                <div class="flex justify-around">
                                    <span class="text-xl  mr-2 align-middle">
                                    <img src="{{$url->icon}}" alt=""> 
                                    </span>
                                    <span class="text-gray-500 capitalize">{{$url->icon_name}}</span>
                                </div>
                                <span class=" align-middle mr-3 text-gray-500 hover:text-gray-900">
                                <a href="{{URL::to($url->url)}}"    target="blank" @click="addVisit({{$url->id}})" ><i class="fa fa-play"></i> Play </a>
                                </span>
                                
                              </div>
                               
                                
                               
                          
                           
                        @endforeach
                    </div>
                        
                   </div>
                   @endforeach
                </div>
              
               
            

        </div>

        <div class="container mx-auto justify-center" >
            <h3 class="text-gray-800 font-bold text-sm text-center capitalize">get in touch</h3>
            <div class="container mx-auto flex flex-wrap justify-center" >
            @foreach ($user_social_links as $item)
        <a href="{{$item->link}}" target="blank"> <img class="h-5 w-5 mr-2" src="{{$item->icon->icon_path}}" alt=""> </a>
        <a href="{{$item->link}}" target="blank"> <img class="h-5 w-5 mr-2" src="{{$item->icon->icon_path}}" alt=""> </a>
        <a href="{{$item->link}}" target="blank"> <img class="h-5 w-5 mr-2" src="{{$item->icon->icon_path}}" alt=""> </a>
        <a href="{{$item->link}}" target="blank"> <img class="h-5 w-5 mr-2" src="{{$item->icon->icon_path}}" alt=""> </a>
        <a href="{{$item->link}}" target="blank"> <img class="h-5 w-5 mr-2" src="{{$item->icon->icon_path}}" alt=""> </a>

            @endforeach
            </div>
        </div>


   <div class="flex justify-center">
    <a href="{{URL::to('/')}}" class="text-gray-500 font-bold   text-xl text-center ">@TwineLink</a>
   </div>
    </div>
@endsection

@section('script')
    <script>
        new Vue({
            el:'#url',
            
            methods:{
                async addVisit(id){
                try {
                    //await console.log(id)
                 
                    const res = await axios.post(`/api/media/url/visit/${id}`)
                    console.log(res)
                    return
                } catch (error) {
                    
                }
            }
            }
        })
    </script>
@endsection