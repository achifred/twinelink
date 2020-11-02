@extends('layouts.homelayout')

@section('content')
   

    <main>
      
        <div class="relative  pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh">
          <div
        class="absolute bg-white top-0 w-full h-full bg-center bg-cover bg-fixed bg-no-repeat "
     
      >
       
       
      </div>
            <div class="container relative mx-auto">
              @include('layouts.alert')
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 mr-auto ml-auto text-center px-4">

                        <h1 class="text-6xl font-bold text-gray-800">About Twinelink</h1>
                       
                        <p class=" text-2xl lg:text-3xl italic font-bold leading-relaxed text-gray-700 px-6 py-3 "><q> your presence on the internet should never be a headache.  That's why Twinelink is here to make that a hustle free!!</q></p>
                       
                        

                         
                      </div>
                    </div>

                    
                </div>
            </div>
        

        <section>
          <div class="flex flex-wrap break-words w-full lg:w-1/2 container mx-auto justify-center px-4 py-2 lg:mb-20">
            <p class="text-justify leading-relaxed text-lg font-semibold text-gray-600">TwineLink is a platform designed to make your dicoverablity on the internet an easy one.  TwineLink helps you connect your contents to a larger audience. We believe your presence on the internet should be an easy journey</p>
          </div>
          <div class="flex flex-wrap container mx-auto justify-center">
            <div class="w-full lg:w-2/3 px-4 bg-orange-600 h-auto rounded-lg">
            <img src="{{URL::asset('img/about.jpg')}}" alt="..." class="shadow rounded-lg  max-w-full -mb-20 lg:-mt-20 h-auto align-middle border-none" />
            </div>
          </div>
        </section>


        <section data-aos="fade-right">
          
            <div class="flex flex-wrap items-center mt-32" id="contact">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div
                      class="text-gray-100  text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-orange-600"
                    >
                      <i class="fas fa-address-book text-xl"></i>
                    </div>
                    <h3 class="text-3xl  font-semibold leading-normal capitalize">
                      Get in touch
                    </h3>
                    <p
                      class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                    >
                    We are located in Ghana, West Africa. Send us an email, give us a call, or send a brief message if you're interested in reaching us. 
                    
                    </p>
                    <h5 class="font-semibold text-3xl capitalize">Corporate Address</h5><br>
                    <div class="flex flex-col mb-3">
                        <h5 class="text-gray-700"> <i class="fas fa-map-marker-alt"></i> GE-263-2093</h5>
                        <p class="text-gray-700"> Accra, Ghana.</p>
                    </div>
        
                    <div class="flex flex-col mb-3">
                        <h5 class="text-gray-700"> <i class="fas fa-phone"></i> 0548480707</h5>
                    </div>
                    <div class="flex flex-col">
                        <h5 class="text-gray-700"> <i class="fa fa-envelope"></i> info@twinelink.com</h5>
                    </div>
        
                   
                  
                  </div>
        
              <div class="w-full md:w-4/12 px-4 mr-auto ml-auto" id="about">
                <form action="{{URL::to('/enqueries')}}" method="POST">
                    @csrf
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="email"
                        >Email Address</label
                      ><input
                        type="email"
                        class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                        placeholder="your email adress"
                        name="email"
                        style="transition: all 0.15s ease 0s;"
                      />
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="full_name"
                        >Full Name</label
                      ><input
                        type="text"
                        class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                        placeholder="your full name"
                        name="full_name"
                        style="transition: all 0.15s ease 0s;"
                      />
                    </div>
        
                    <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-700 text-xs font-bold mb-2"
                          for="subject"
                          >Subject</label
                        ><input
                          type="text"
                          class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                          placeholder="your subject"
                          name="subject"
                          style="transition: all 0.15s ease 0s;"
                        />
                      </div>
        
                    <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-700 text-xs font-bold mb-2"
                          for="message"
                          >Message</label
                        ><textarea
                          type="text"
                          rows="10"
                          class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                          placeholder="your message"
                          name="message"
                          style="transition: all 0.15s ease 0s;"
                        > </textarea>
                      </div>
                      
                    
                    <div class="text-center mt-2 mb-12">
                      <button
                      
                        class="bg-orange-600 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit"
                        style="transition: all 0.15s ease 0s;"
                      >
                        Send
                      </button>
                    </div>
                  </form>
              
              </div>
        
              
        
        
            </div>
      </section>

        

        

        <footer class="relative bg-gray-100 pt-8 pb-6">
            
            <div class="container mx-auto px-4">
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                  <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                  <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    Find us on any of these platforms.
                  </h5>
                  <div class="mt-6">
                    <a href="https://www.instagram.com/twinelink" target="_blank"
                      class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-instagram"></i></a
                    ><a href="https://web.facebook.com/twinelink" target="_blank"
                      class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-facebook-square"></i></a
                    >

                    <a href="https://twitter.com/twinelink" target="_blank"
                      class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-twitter-square"></i></a
                    >
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                      <span
                        class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                        >Useful Links</span
                      >
                      <ul class="list-unstyled">
                       
                        <li>
                          <a
                            class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                            href="{{URL::to('/about')}}"
                            >About</a
                          >
                        </li>


                        <li>
                            <a
                              class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                              href="/#contact"
                              >Contact</a
                            >
                          </li>
                        
                      </ul>
                    </div>
                   
                  </div>
                </div>
              </div>
              <hr class="my-6 border-gray-400" />
              <div
                class="flex flex-wrap items-center md:justify-between justify-center"
              >
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                  <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2020 
                    <a
                      href="/"
                      class="text-gray-600 hover:text-gray-900"
                      >TwineLink</a
                    >.
                  </div>
                </div>
              </div>
            </div>
          </footer>
    </main>
@endsection