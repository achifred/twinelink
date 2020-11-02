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
            class=" font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap capitalize text-gray-900"
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
          id="example-collapse-navbar"
        >
         
          
        </div>
      </div>
    </nav>