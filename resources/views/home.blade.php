@extends('layouts.homelayout')

@section('content')
   

    <main>
      
        <div class="relative  pt-16 lg:pb-32  content-center items-center justify-center" style="min-height: 100vh">
          <div class="absolute top-0 w-full h-full  ">
        <span id="blackOverlay" class="w-full h-full absolute  bg-white" ></span>
        
      </div>
            <div class="container relative mx-auto">
              @include('layouts.alert')
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 mr-auto ml-auto text-center px-4">

                        <h1 class=" text-4xl lg:text-6xl font-bold pt-10 text-gray-700 introtext">All your links in one safe place</h1>
                        <p class="text-2xl  font-bold leading-relaxed text-gray-700">Let your audience connect with you using one link</p>

                       
                        <div class="block lg:flex flex-wrap justify-center mt-8 mb-8">
                           <div class="mb-10  lg:mb-0">
                            @if (auth()->user())
                            <a title="Register" class=" bg-green-600 hover:bg-orange-600 text-gray-100 font-bold capitalize rounded-full px-4 py-2 btnl " href="{{URL::to('/admin')}}" >Create a link</a>
                            
                            @else
                            <a title="Register" class=" bg-green-600 hover:bg-orange-600 text-gray-100 font-bold capitalize rounded-full px-4 py-2 btnl " href="{{URL::to('/register')}}" >get started for free</a>
                            @endif
                           </div>
                           <div>
                            
                            @if (auth()->user())
                            <span class="ml-2 py-2 text-lg text-gray-600 font-bold italic">Let the world discover your content</span>
                            
                            @else
                            <span class="ml-2 py-2 text-lg text-gray-600 font-bold italic">Already on TwineLink?</span>
                            <a title="log in to TwineLink" class=" text-orange-500 text-lg font-bold italic leading-relaxed" href="{{URL::to('/login')}}"  > <u> Log in</u></a>
                            @endif
                           </div>
                          </div>
                          <p class="text-lg italic font-bold  leading-relaxed text-gray-600 ">Do more with one link !!</p>
                        
                      </div>

                      <div class="w-full lg:w-6/12 mr-auto ml-auto text-center px-4">
                        <div class="flex flex-wrap justify-center pt-8 lg:pt-32">
                          <div class="w-full px-4  h-64  intro ">
                          <img src="{{URL::asset('img/icongroup.png')}}" alt="..." class="  max-w-full lg:-mb-20  lg:-mt-20 mt-8 align-middle border-none" />
                          </div>
                        </div>
                        
                      </div>
                    </div>

                    
                </div>
                
                
            </div>
            <div
            class=" top-auto bottom-0 left-0 right-0 w-full   pointer-events-none overflow-hidden"
            style="height: 70px; transform: translateZ(0px);"
          >
            <svg
              class="absolute bottom-0 overflow-hidden"
              xmlns="http://www.w3.org/2000/svg"
              preserveAspectRatio="none"
              version="1.1"
              viewBox="0 0 2560 100"
              x="0"
              y="0"
            >
              <polygon
                class="text-gray-200 fill-current"
                points="2560 0 2560 100 0 100"
              ></polygon>
            </svg>
          </div>
            
        <section class="bg-gray-200">
          
          <h3 class="text-center text-3xl text-gray-700 font-extrabold capitalize pt-8">How it works</h3>
      <div class="block lg:flex flex-wrap justify-center ">

        <div class=" lg:pt-12 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-600"
              >
                <i class="fa fa-user-circle fa-2x"></i>
              </div>
              <h6 class="text-xl text-gray-700 font-extrabold">Create Account</h6>
              <p class="mt-2 mb-4 text-gray-600">
                Create an account if you don't have one already. If you already have an account log in to your dashboard.
              </p>
            <a href="{{URL::to('/login')}}" class="text-center text-teal-700 font-bold text-sm italic capitalize">create one here </a>
            </div>
          </div>
        </div>
          

        <div class="lg:pt-12  w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-orange-700"
              >
                <i class="fa fa-link fa-2x"></i>
              </div>
              <h6 class="text-xl text-gray-700 font-extrabold">Add Links</h6>
              <p class="mt-2 mb-4 text-gray-600">
                From your dashboard, add as many links to your contents as you can. 
                A one time  twinelink will be generated for you containing all the links you've added.
                <a href="{{URL::to('/admin')}}" class="text-center text-orange-700 font-bold italic text-sm capitalize">add one here</a>
              </p>

             
            </div>
          </div>
        </div>


        <div class="lg:pt-12  w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full pb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-gray-700"
              >
                <i class="fa fa-share-alt fa-2x"></i>
              </div>
              <h6 class="text-xl text-gray-700 font-extrabold">Share Your Link</h6>
              <p class="mt-2 mb-2 text-gray-600">
                Happily share the twinelink generated for you. Hurray!! you are good to go. You are now all over the internet. 
              </p>
              <a href="{{URL::to('/admin')}}" class="text-center text-gray-700 font-bold italic text-sm capitalize">see how </a>
            </div>
          </div>
        </div>
             
    </div>

        </section>

        <section  data-aos="fade-left ">
          <div class="flex flex-wrap items-center pt-32 bg-gray-200" >
              <div class="w-full md:w-5/12 px-4 mr-auto ml-auto mb-3">
                <div
                  class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-green-600"
                >
                  <i class="fas fa-handshake text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 text-gray-700 font-extrabold leading-normal capitalize">
                  to your advantage
                </h3>
                <p
                  class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                >
                TwineLink empowers you to enable your audience discover your contents on various platforms  through one link.
                </p>
                
        
      
                <a
                class=" font-bold  mr-4 px-3 py-2  whitespace-no-wrap capitalize bg-white border border-gray-600 rounded-lg text-gray-500"
                 href="{{URL::to('/register')}}"
                >
                Sign Up Today!
                </a>
              </div>
        
        
              <div class="w-full md:w-4/12 px-4 mr-auto ml-auto ">
                <div
                  class="relative flex flex-col min-w-0 break-words  w-full mb-6 shadow-lg rounded-lg bg-green-600"
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
                        class="text-green-600 fill-current"
                      ></polygon>
                    </svg>
                    
                    <p class="text-md font-semibold mt-2 italic text-white">
                      Your online presence is our priority
                    </p>
                  </blockquote>
                </div>
              </div>
            </div>


            <div class="flex flex-wrap items-center pt-32" >

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


              <div class="w-full md:w-5/12 px-4 mr-auto ml-auto" data-aos="fade-zoom-in">
                <div
                  class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-orange-500"
                >
                  <i class="fas fa-handshake text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 text-gray-700 font-extrabold leading-normal capitalize">
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
        
        
      </section>

      <div
            class=" top-auto bottom-0 left-0 right-0 w-full   pointer-events-none overflow-hidden"
            style="height: 70px; transform: translateZ(0px);"
          >
            <svg
              class="absolute bottom-0 overflow-hidden"
              xmlns="http://www.w3.org/2000/svg"
              preserveAspectRatio="none"
              version="1.1"
              viewBox="0 0 2560 100"
              x="0"
              y="0"
            >
              <polygon
                class="text-gray-200 fill-current"
                points="2560 0 2560 100 0 100"
              ></polygon>
            </svg>
          </div>
        
      <section id="contact" class="bg-gray-200">
        <div class="flex flex-wrap items-center " >
          <div class="w-full md:w-5/12 px-4 mr-auto ml-auto ">
              <div
                class="text-gray-100 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-orange-600"
              >
                <i class="fas fa-address-book text-xl"></i>
              </div>
              <h3 class="text-3xl mb-2 text-gray-700 font-extrabold leading-normal capitalize">
                Get in touch
              </h3>
              <p
                class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
              >
              We are located in Ghana, West Africa. Send us an email, give us a call, or send a brief message if you're interested in reaching us. 
              
              </p>
              <h5 class="text-gray-700 font-extrabold text-3xl capitalize">Corporate Address</h5><br>
              <div class="flex flex-col mb-3">
                  <h5 class="text-gray-700"> <i class="fas fa-map-marker-alt"></i> GE-263-2093</h5>
                  <p class="text-gray-700"> Accra, Ghana.</p>
              </div>
  
              <div class="flex flex-col mb-3">
                  <h5 class="text-gray-700"> <i class="fas fa-phone"></i> +233 548480707 / +233 247279090 </h5>
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
        

        <footer class="relative bg-gray-200 pt-8 pb-6">
            
            <div class="container mx-auto px-4">
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                  <h4 class="text-3xl text-gray-700 font-extrabold">Let's keep in touch!</h4>
                  <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    Find us on any of these platforms.
                  </h5>
                  <div class="mt-6">
                    <a href="https://www.instagram.com/twinelink" target="_blank"
                      class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button">
                      <i class="flex fab fa-instagram"></i>
                    </a>
                      <!--a href="https://web.facebook.com/twinelink" target="_blank"
                      class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button">
                      <i class="flex fab fa-facebook-square"></i>
                    </a-->

                    <a href="https://twitter.com/twinelink" target="_blank"
                      class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button">
                      <i class="flex fab fa-twitter-square"></i>
                    </a>
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                      <span
                        class="block uppercase text-gray-600 text-sm font-semibold mb-2 pt-5"
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
                      >twinelink.com</a>
                  </div>
                </div>
              </div>
            </div>
          </footer>
    </main>
@endsection

@section('script')
  <script>
     AOS.init({
      offset: 120,
      delay: 1000
  });
     gsap.from(".intro", { duration: 2,
    x: -100,
    ease: "power1",
    opacity:0,
    scale: 0.2,
    delay: 2 });
    gsap.from(".introtext", { duration: 2,
    x: -100,
    ease: "power1",
    opacity: 0.5,
    scale: 0.2,
    delay: 1 });
    gsap.to(".btnl", { duration: 1, y: 2, ease: "power1.inOut", repeat: -1 });
  </script>
@endsection