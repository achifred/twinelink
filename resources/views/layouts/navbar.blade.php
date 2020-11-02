<nav
      class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg  "
    >
      <div
        class="container px-4 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
          <a 
            class=" font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap capitalize"
              href="{{URL::to('/')}}">
              <span class="text-teal-800 font-bold text-xl">Twine</span><span class="text-orange-600 font-bold text-xl">Link</span> 
              </a
          ><button
            class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button"
            onclick="toggleNavbar('example-collapse-navbar')"
          >
            <i class="text-gray-900 fas fa-bars"></i>
          </button>
        </div>
        <div
          class="lg:flex flex-grow items-center bg-gray-800 lg:bg-transparent lg:shadow-none hidden"
          id="example-collapse-navbar"
        >
         
          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            <li class="flex items-center">
             @if (auth()->user())
             <a
             class="text-gray-500 px-3 py-4 lg:py-2 flex items-center  capitalize font-bold"
         href="{{URL::to('/admin/logout')}}"
             >
             Log out
             </a>
             @else
             <a
             class="text-gray-500 px-3 py-4 lg:py-2 flex items-center  capitalize font-bold"
         href="{{URL::to('/login')}}"
             >
             Log in
             </a>
             @endif
            </li>
            <li class="flex items-center">
             @if (auth()->user())
             <a
             class=" font-bold  mr-4 px-3 py-2 whitespace-no-wrap capitalize bg-white border border-gray-600 rounded-lg text-gray-500"
           href="{{URL::to('/admin')}}"
             >
            <i class="fa fa-user text-black"></i> Admin
             </a>
             @else
             <a
             class=" font-bold  mr-4 px-3 py-2 whitespace-no-wrap capitalize bg-white border border-gray-600 rounded-lg text-gray-500"
           href="{{URL::to('/register')}}"
             >
             Sign Up Free
             </a>
             @endif
            </li>
            
          </ul>
        </div>
      </div>
    </nav>