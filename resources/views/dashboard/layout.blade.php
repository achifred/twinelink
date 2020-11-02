@extends('layouts.main')

@section('content')
<div>
    @include('dashboard.nav')
    <div class="flex   mt-16">
      @include('dashboard.sidebar')
      <div class=" lg:ml-56 w-10/12 container mx-auto items-center justify-center lg:px-12 p-4 h-auto  bg-cool-gray-50">
        
          @yield('main')
        
      </div>
    </div>
  </div>
@endsection