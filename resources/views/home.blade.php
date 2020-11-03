@extends('layouts.homelayout')

@section('content')
   

    <main>
      
        <div class="relative  pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 100vh">
          <div
        class="absolute top-0 w-full h-full bg-center bg-cover bg-fixed bg-no-repeat "
     style='background-image: url("{{URL::to('img/back.jpg')}}");'
      >
        <span
          id="blackOverlay"
          class="w-full h-full absolute opacity-50 bg-black"
        ></span>
       
      </div>
            <div class="container relative mx-auto">
              @include('layouts.alert')
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 mr-auto ml-auto text-center px-4">

                        <h1 class=" text-4xl lg:text-6xl font-bold text-gray-200">All your links in one safe place</h1>
                        <p class="text-xl italic font-bold leading-relaxed text-gray-100">Let your audience connect with you using one link</p>
                        <div class="block lg:flex flex-wrap justify-center mt-5 mb-5">
                           <div class="mb-10  lg:mb-0">
                            <a title="Register" class=" bg-teal-900 hover:bg-orange-600 text-gray-100 font-bold capitalize rounded px-4 py-2 " href="{{URL::to('/register')}}" >get started for free</a>
                           </div>
                           <div>
                            <span class="ml-2 py-2 text-lg text-gray-300 font-bold italic">Already on TwineLink?</span>
                            @if (auth()->user())
                            <a title="log in to TwineLink" class=" text-orange-500 text-lg font-bold italic leading-relaxed" href="{{URL::to('/admin')}}"  > <u>Admin</u></a>
                            @else
                            <a title="log in to TwineLink" class=" text-orange-500 text-lg font-bold italic leading-relaxed" href="{{URL::to('/login')}}"  > <u>Log in</u></a>
                            @endif
                           </div>
                          </div>

                        
                      </div>
                    </div>

                    
                </div>
            </div>
        </div>

        <section>
          <h3 class="text-center text-3xl text-gray-900 font-bold capitalize pt-8">How it works</h3>
      <div class="block lg:flex flex-wrap justify-center ">

        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-teal-700"
              >
                <i class="fa fa-user-circle fa-2x"></i>
              </div>
              <h6 class="text-xl font-semibold">Create Account</h6>
              <p class="mt-2 mb-4 text-gray-600">
                Create an account if you don't have one already. If you already have an account log in to your dashboard.
              </p>
            </div>
          </div>
        </div>
          

        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-orange-700"
              >
                <i class="fa fa-link fa-2x"></i>
              </div>
              <h6 class="text-xl font-semibold">Add Links</h6>
              <p class="mt-2 mb-4 text-gray-600">
                From your admin dashboard, add as many links to your contents as you can. 
                A one time  twinelink will be generated for you containing all the links you've added.
              </p>
            </div>
          </div>
        </div>


        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-700"
              >
                <i class="fa fa-share-alt fa-2x"></i>
              </div>
              <h6 class="text-xl font-semibold">Share Your Link</h6>
              <p class="mt-2 mb-4 text-gray-600">
                Happily share the twinelink generated for you. Hurray!! you are good to go. You are now all over the internet. 
              </p>
            </div>
          </div>
        </div>
             
    </div>
        </section>

        <section data-aos="fade-right">
          <div class="flex flex-wrap items-center mt-32" >
              <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <div
                  class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-teal-800"
                >
                  <i class="fas fa-handshake text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 font-semibold leading-normal capitalize">
                  to your advantage
                </h3>
                <p
                  class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                >
                TwineLink empowers you to enable your audience discover your contents on various platforms  through one link.
                </p>
                
        
      
                <a
                class=" font-bold  mr-4 px-3 py-2 whitespace-no-wrap capitalize bg-white border border-gray-600 rounded-lg text-gray-500"
                 href="{{URL::to('/register')}}"
                >
                Sign Up Today!
                </a>
              </div>
        
        
              <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                  class="relative flex flex-col min-w-0 break-words  w-full mb-6 shadow-lg rounded-lg bg-teal-800"
                >
                  <img
                    alt="..."
              src="{{URL::to('img/link.jpg')}}"
                    class="w-full align-middle rounded-t-lg"
                  />
                  <blockquote class="relative p-8 mb-4">
                    <svg
                      preserveAspectRatio="none"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 583 95"
                      class="absolute left-0 w-full block"
                      style="height: 95px; top: -94px;"
                    >
                      <polygon
                        points="-30,95 583,95 583,65"
                        class="text-teal-800 fill-current"
                      ></polygon>
                    </svg>
                    
                    <p class="text-md font-semibold mt-2 italic text-white">
                      Your online presence is our priority
                    </p>
                  </blockquote>
                </div>
              </div>
            </div>


            <div class="flex flex-wrap items-center mt-32" >

              <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                  class="relative flex flex-col min-w-0 break-words  w-full mb-6 shadow-lg rounded-lg bg-orange-500"
                >
                  <img
                    alt="..."
              src="{{URL::to('img/happy.jpg')}}"
                    class="w-full align-middle rounded-t-lg"
                  />
                  <blockquote class="relative p-8 mb-4">
                    <svg
                      preserveAspectRatio="none"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 583 95"
                      class="absolute left-0 w-full block"
                      style="height: 95px; top: -94px;"
                    >
                      <polygon
                        points="-30,95 583,95 583,65"
                        class="text-orange-500 fill-current"
                      ></polygon>
                    </svg>
                    
                    <p class="text-md font-semibold italic mt-2 text-white">
                      Sign up and get your content out there
                    </p>
                  </blockquote>
                </div>
              </div>


              <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <div
                  class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-orange-500"
                >
                  <i class="fas fa-handshake text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 font-semibold leading-normal capitalize">
                  your content in one place
                </h3>
                <p
                  class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                >
                TwineLink is the gateway to your oneline store, latest blog posts,latest videos, website, social media posts. Everywhere online.
                </p>
                
        
      
                <a
                class=" font-bold  mr-4 px-3 py-2 whitespace-no-wrap capitalize bg-white border border-gray-600 rounded-lg text-gray-500"
                 href="{{URL::to('/register')}}"
                >
                Sign Up Today!
                </a>
              </div>
        
        
              
            </div>
        
        
        
            <div class="flex flex-wrap items-center mt-32" id="contact">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div
                      class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-orange-600"
                    >
                      <i class="fas fa-address-book text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal capitalize">
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
                        <h5 class="text-gray-700"> <i class="fa fa-envelope"></i> twinelink@gmail.com</h5>
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