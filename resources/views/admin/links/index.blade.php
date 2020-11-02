@extends('layouts.layout')
@section('title')
{{$username}}|TwinedLink
@endsection

@section('content')

<div class="contaniner mx-auto  h-screen" id="client" style="background:{{$background_color}}">
        <div class="block lg:flex flex-wrap ">

            <div class="w-full  ml-auto mr-auto">
                <div class="relative flex flex-col justify-center">
                    <div class="mx-auto">
                        <img class="h-20 w-20 rounded-full align-middle " src="{{$picture==NULL?URL::asset('img/user.png'):$picture}}"  alt="">
                    </div>
                     <small class="text-center text-gray-500"><small>@</small>{{$username}}</small>
                </div>
                <div class="flex flex-col text-center pt-10 w-full">
                @foreach ($links as $item)
                <div class="" >
                    
                        
                    
                <a href="{{$item->link}}" @click="addVisit({{$item->id}})"  class=" w-5/6 lg:w-3/12  px-4 py-2 mb-5   capitalize" type="button" 
                    style=" background-color:{{$text_color}};color:{{$background_color}}; " target="blank">
                   
                    {{$item->name}} 
                </a>
                    </div>
                @endforeach
                    
               </div>
            </div>

        </div>

    <a href="{{URL::to('/')}}" class="text-gray-500 font-bold  fixed text-xl text-center left-0 right-0" style="bottom:1rem;">@TwinedLink</a>
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