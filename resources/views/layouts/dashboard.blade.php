@extends('layouts.main')

@section('content')
    
<div>
  @include('layouts.nav')
  <div class="flex mt-16">
    @include('layouts.sidebar')
    <div class=" w-full lg:w-10/12 container mx-auto items-center justify-center  lg:flex-no-wrap flex-wrap lg:px-10 px-4  p-4 h-auto  bg-cool-gray-50">
      
        @yield('main')
      
    </div>
  </div>
</div>
@endsection