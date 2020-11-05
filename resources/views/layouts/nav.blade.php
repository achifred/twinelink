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
            href="{{URL::to('/admin')}}"
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
              <a
              class="lg:hidden  lg:hover:text-gray-300 text-gray-600 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="{{URL::to('/admin')}}"
                >
                <i class="fa fa-link fa-2x mr-2"></i>  <span>Links</span>
                </a>
            </li>
            <li class="flex items-center">
              <a
              class="lg:hidden  lg:hover:text-gray-300 text-gray-600 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="{{URL::to('/admin/account')}}"
                >
                <i class="fa fa-user fa-2x mr-2"></i>  <span>Account</span>
                </a>
            </li>
            <li class="flex items-center">
              <a
                class="text-gray-600 hover:text-gray-800  px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                href="{{URL::to('/admin/settings')}}"
                >
                <i class="fa fa-cog fa-2x mr-2"></i>  <span >Settings</span>
                </a>
            </li>
            
            <li class="flex items-center">
            <a href="{{URL::to('/admin/logout')}}"
              @click.prevent="logout"
                class="text-gray-600 hover:text-gray-800  px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
              
                >
                <i class="fa fa-power-off fa-2x mr-2"></i>  <span>log out</span>
            </a>
            </li>
           
            
          </ul>
        </div>
      </div>
    </nav>