<div class="hidden lg:left-0 lg:block lg:fixed lg:top-0 lg:bottom-0 lg:overflow-y-auto  lg:flex-no-wrap md:overflow-hidden shadow-xl bg-white  flex-wrap items-center justify-between relative lg:w-1/6 z-10 py-4 px-6 ">
    

    <div class="items-center mt-10 ">
        <div class="mb-4">
            <a href="{{URL::to('/dashboard/users')}}" class="text-gray-500 text-normal hover:text-orange-600"> <i class="fa fa-users px-3"></i> Linkers</a>
            </div>
            <div class="mb-4">
                <a href="{{URL::to('/dashboard/themes')}}" class="text-gray-500 text-normal hover:text-orange-600"> <i class="fa fa-palette px-3"></i> Themes</a>
             </div>
             <div class="mb-4">
                <a href="{{URL::to('/dashboard/icons')}}" class="text-gray-500 text-normal hover:text-orange-600"> <i class="fa fa-icons px-3"></i> Icons</a>
             </div>
        <div class="absolute  flex flex-col justify-center" style="bottom: 1rem">
        <div class="mx-auto">
            <a href="{{URL::to('/dashboard/account/')}}">Profile</a>
        </div>
        
      </div>
   
    </div>
</div>