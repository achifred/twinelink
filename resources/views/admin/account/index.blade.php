@extends('layouts.dashboard')

@section('main')
    <div class="container mx-auto" id="account">
        <div
        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6  rounded-lg mt-20"
      >
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div
              class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
            >
              <div class="relative">
              <form v-if="isChangePicture" class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/admin/acount/picture/'.auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf     
                
                  <div class="flex items-center border-b border-green-500 py-2 mb-4">
                      
                  <input type="file" name="picture" id="picture"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    @change="getPicture($event)"  required>
                  </div>
      
                  
                  <div class=" flex flex-wrap text-center ">
                      <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                          Change Picture
                      </button>
                    
                  </div>
                  
              </form>
            <img v-else class="h-20 w-20 rounded-full align-middle " v-bind:src="avatar==''?'https://twinelink.com/img/user.png':avatar" alt="">
              </div>
            </div>
           
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                 
                  <div class="mr-4 p-3 text-center">
                    
                    <button @click.prevent="togglePassword" class=" active:bg-pink-600 uppercase text-gray-600 font-bold hover:shadow-md  text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button">
                      @{{isPassword?"Close":"Reset Password"}}
                    </button>
                    </div>
                  
                  
                </div>
            </div>

            <div class="w-full lg:w-4/12 px-4 lg:order-3">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  
                  <button @click.prevent="togglePicture" class=" active:bg-pink-600 uppercase text-gray-600 font-bold hover:shadow-md  text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button">
                    @{{isChangePicture?"Close":"Change Picture"}}
                  </button>
                </div>
                
                
              </div>
          </div>
          
        </div>
            
          </div>
          <div class="text-center mt-12">
            @include('layouts.alert')
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
            <form v-if="isPassword" action="{{URL::to('/admin/password/'.auth()->user()->id)}}" method="POST"  class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3">
                        
                @csrf
                <div class="flex items-center border-b border-green-500 py-2 mb-4">
                    
                    <input type="password" name="oldpassword" id="oldpassword"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                   placeholder="old password"  required>
                </div>
    
                <div class="flex items-center border-b border-green-500 py-2 mb-6">
                    
                    <input type="password" name="password" id="password"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                placeholder="new password" required>
                </div>
                <div class=" flex flex-wrap text-center ">
                    <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Change Password
                    </button>
                  
                </div>
                
            </form>
            <form v-else class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3">
                        
                
                    <div class="flex items-center border-b border-green-500 py-2 mb-4">
                        
                        <input type="text" name="username" id="username"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    :value="username"  required>
                    </div>
        
                    <div class="flex items-center border-b border-green-500 py-2 mb-6">
                        
                        <input type="email" name="email" id="email"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                    :value="email" required>
                    </div>
                    <div class=" flex flex-wrap text-center ">
                        <button @click.prevent="updateDetails" class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Save Details
                        </button>
                      
                    </div>
                    
                </form>
            </div>
            <div class=" block lg:flex justify-center mb-5">
              <a href="{{URL::to('/admin')}}" class="bg-gray-700 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button">
                Links
            </a>
            <a href="{{URL::to('/admin/settings')}}" class="bg-gray-700 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button">
              Settings
          </a>
            </div>
            <h1 class="text-center font-bold text-xl text-gray-900 mb-5">Danger Zone</h1>
            <a href="{{URL::to('/admin/account/delete/'.auth()->user()->id)}}" class="bg-red-700 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button">
                Delete Account
            </a>
          </div>
          
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script>
      new Vue({
        el:'#account',
        data(){
          return{
            username:"{{auth()->user()->username}}",
            email:"{{auth()->user()->email}}",
            user_id:"{{auth()->user()->id}}",
            token:"{{Session::get('token')}}",
            isPassword:false,
            isChangePicture:false,
            file:'',
            avatar:"{{auth()->user()->picture}}"
          }
        },

        methods:{
          togglePassword(){
            this.isPassword = !this.isPassword
          },
          togglePicture(){
            this.isChangePicture = !this.isChangePicture
          },

          getPicture(event){
            this.file = event.target.files[0]
          },

         async changePicture(){
          try {
            //console.log(this.file)
              let data = new FormData()
              data.append('picture',this.file)
              
              let config = {
                header : {
                'Content-Type' : 'multipart/form-data'
              }
              }

              const res = await axios.put(`/api/acount/picture/${this.user_id}`,
                data,
                config,
                axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`

              )
              //console.log(res)
              if(res.data.status=="success"){
               this.avatar= res.data.data            
               
              return
            }
          } catch (error) {
            //console.log(error)
          }
         },

          async updateDetails(){
            try {
              const res = await axios.put(`/api/account/${this.user_id}`,{
                username:document.getElementById('username').value,
                email:document.getElementById('email').value
              },
              axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
              )
              //console.log(res)
              if(res.data.status=="success"){
               this.username= res.data.data[0].username            
               this.email= res.data.data[0].email 
              return
            }
            } catch (error) {
              //console.log(error)
            }
          }
        }
      })
    </script>
@endsection