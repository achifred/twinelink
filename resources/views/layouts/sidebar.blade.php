<div
    class="hidden lg:left-0 lg:block lg:fixed lg:top-0 lg:bottom-0 lg:overflow-y-auto  lg:flex-no-wrap md:overflow-hidden shadow-xl bg-white  flex-wrap items-center justify-between relative lg:w-1/12 z-10 py-4 px-6 ">


    <div class="items-center mt-20 ">
        <div class="mb-4">
            <a href="{{ URL::to('/admin/url') }}" class="text-gray-500 text-normal hover:text-orange-600"> <i
                    class="fa fa-link px-3"></i> Smart Urls</a>
        </div>
        <div class="absolute  flex flex-col justify-center" style="bottom: 1rem">
            <div class="mx-auto">
                <a href="{{ URL::to('/admin/account/') }}"><img class="h-12 w-12 rounded-full align-middle "
                        src="{{ auth()->user()->picture == null ? URL::asset('img/user.png') : auth()->user()->picture }}"
                        alt=""></a>
            </div>

        </div>

    </div>
</div>
