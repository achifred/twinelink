@if (session()->has('msg'))
<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-700">
  <span class="text-xl inline-block mr-5 align-middle">
    <i class="fas fa-bell"></i>
  </span>
  <span class="inline-block align-middle mr-8">
    {{session()->get('msg')}}
  </span>
  <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
    <span>×</span>

  </button>
</div>
    
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)

<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-700">
  <span class="text-xl inline-block mr-5 align-middle">
    <i class="fas fa-bell"></i>
  </span>
  <span class="inline-block align-middle mr-8">
    {{$error}}
  </span>
  <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
    <span>×</span>

  </button>
</div>

@endforeach
@endif



      