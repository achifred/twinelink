@extends('layouts.layout')
@section('title')
{{$username}}|TwinedLink
@endsection

@section('content')


<div class="contaniner mx-auto min-h-screen " id="client" style="background:{{$background_color}}">
        <div class="block lg:flex flex-wrap ">

            <div class="w-full border-l-4 border-green-600 shadow-2xl min-h-screen lg:mt-5  rounded-lg  ml-auto mr-auto lg:w-3/12" >
                <div class="relative flex flex-col justify-center">
                    
                    <div class=" w-full h-32  bg-center bg-cover bg-no-repeat" style='background-image: url("{{$banner==NULL?URL::asset('img/back2.jpg'):$banner}}");'>
                        <div class=" flex justify-center text-center ">
                            <img class="h-20 w-20  rounded-full align-middle m-20 ml-20 lg:ml-20" src="{{$picture==NULL?URL::asset('img/user.png'):$picture}}"  alt="">
                        </div>
                    </div>
                     <small class="text-center pt-8 text-gray-500"><small>@</small>{{$username}}</small>
                </div>
                <div class="flex flex-col text-center pt-5 ">
                <div class="container mx-auto ">
                    @foreach ($links as $item)
                <a href="{{$item->link}}">
                    <div class=" w-10/12  container mx-auto  px-4 py-2 border-b-4 border-green-600 rounded  mb-4 "  style=" background-color:{{$text_color}};color:{{$background_color}};">
                        <span class="text-xl inline-block mr-1 align-middle">
                        <img src="{{$item->icon?$item->icon->icon_path:''}}" alt="">
                        </span>
                        
                            <a href="{{$item->link}}" class=" inline-block align-middle mr-1"   target="blank"  @click="addVisit({{$item->id}})"> {{$item->name}} </a>
                        
                        
                      </div>
                </a>
               
                @endforeach
                </div>
                    
               </div>
            </div>

        </div>

    <a href="{{URL::to('/')}}" class="text-gray-500 font-bold  fixed text-xl text-center left-0 right-0" style="bottom:1rem;">twinelink.com</a>
    </div>
@endsection

@section('script')
    <script>
        new Vue({
            el:'#client',
            
            methods:{
                async addVisit(id){
                try {
                    //await console.log(id)
                 
                    const res = await axios.post(`/api/visit/${id}`)
                    return
                } catch (error) {
                    
                }
            }
            }
        })
    </script>
@endsection