<nav
      class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white"
    >
      <div
        class="container px-4 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
          <a 
            class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-gray-900"
            href="{{URL::to('/')}}"
            >TwineLink</a
          ><button
            class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button"
            onclick="toggleNavbar('example-collapse-navbar')"
          >
            <i class="text-gray-900 fas fa-bars"></i>
          </button>
        </div>


       

        <div
          class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
          id="example-collapse-navbar">
         
          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            <!-- testing -->
            
            
            <li class="flex items-center">
                <a href="{{URL::to('/dashboard/users')}}" class="lg:hidden text-cool-gray-500 text-normal hover:text-pink-600"> <i class="fa fa-users px-3"></i> Linkers</a>
              </li>
              <li class="flex items-center">
                <a href="{{URL::to('/dashboard/themes')}}" class="lg:hidden text-cool-gray-500 text-normal hover:text-pink-600"> <i class="fa fa-inbox px-3"></i> Themes</a>
              </li>

              <li class="flex items-center">
                <a href="{{URL::to('/dashboard/icons')}}" class="lg:hidden text-cool-gray-500 text-normal hover:text-pink-600"> <i class="fa fa-icons px-3"></i> Icons</a>
              </li>

            
            <li class="flex items-center">
            <a href="{{URL::to('/signout')}}"
              @click.prevent="logout"
                class="text-gray-600 hover:text-gray-800  px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
              
                >
                log out
            </a>
            </li>
           
            
          </ul>
        </div>
      </div>
    </nav>