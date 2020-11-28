@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="settingpage">
        
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
               
                <h3 class="text-gray-800 font-bold text-3xl leading-relaxed text-center">Choose A Theme</h3>
                
                <div class="block lg:flex container mx-auto flex-wrap  ">
                   
                <button  class="w-full lg:w-2/6 h-48 container mx-2 mb-3 rounded-lg px-4 py-6 " v-for="item in themes" @key="item.id" :style="{background:item.background_color}" @click.prevent="changeTheme(item.id)">

                        <div class="mb-3" :style="{borderStyle:'solid', borderWidth:'2px', borderColor:item.text_color,backgroundColor:item.text_color}">
                            <a title="Register" class="font-bold capitalize  rounded px-4 py-2 "  :style="{color:item.background_color}"  >hello</a>
                        </div>
                        
                        <div class="mb-3" :style="{borderStyle:'solid', borderWidth:'2px', borderColor:item.text_color,backgroundColor:item.text_color}">
                            <a title="Register" class="font-bold capitalize  rounded px-4 py-2 "  :style="{color:item.background_color}"  >hello</a>
                        </div>
                    </button>

                   


                </div>
            </div>

            <div class="w-full lg:w-6/12 ml-auto mr-auto" id="linkitems">

    
                <div class="block lg:flex flex-wrap ">

                    <div class="w-full border-l-4 border-green-600 shadow-2xl min-h-screen lg:mt-5  rounded-lg  ml-auto mr-auto lg:w-8/12" :style="{background:bg}" >
                        
                        <div class="relative flex flex-col justify-center">
                            
                            <div class=" w-full h-32  bg-center bg-cover bg-no-repeat" :style="{backgroundImage:'url(' + banner + ')'}" >
                                <form v-if="modal" class="bg-white transition duration-150 ease-in-out">
                                    <div class=" py-2 mb-4 ">
                               
                               <input type="file" name="banner"  @change="onFileChange"  required >
                               
                           </div>
                          
                           <div class=" flex flex-wrap text-center ">
                               <button @click.prevent="changeBanner" class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                                   Change Banner
                               </button>
                             
                           </div>
                           </form>
                                <div class="flex justify-end"> <button title="change banner" @click="toggleModal"> <i class="fa fa-pen-square fa-2x text-gray-400"></i></button></div>
                                <div class=" flex justify-center text-center ">
                                    <img class="h-20 w-20  rounded-full align-middle m-16 ml-16 lg:ml-16" src="{{auth()->user()->picture==NULL?URL::asset('img/user.png'):auth()->user()->picture}}"  alt="">
                                </div>
                            </div>
                             <small class="text-center mt-12 text-gray-500"><small>@</small>{{auth()->user()->username}}</small>
                        </div>
                        <div class="flex flex-col text-center pt-10 ">
                        <div class="container mx-auto ">
                            <div v-for="item in links" @key="item.id" >
                                <div class="px-4 py-2 border-b-4 w-10/12 mx-auto border-green-600 rounded  mb-4 " :style="{backgroundColor:textColors, color:bg}">
                                    <span class="text-xl inline-block mr-2 align-middle">
                                        <img :src="item.icon" alt="">
                                    </span>
                                    <span class="inline-block align-middle mr-3">
                                        <a :href="item.link"    target="blank"> @{{item.name}}</a>
                                    </span>
                                    
                                  </div>
                                   
                                    
                                   
                              
                               </div>
                        </div>
                            
                       </div>
                    </div>
        
                </div>
               
                

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        new Vue({
            el:'#settingpage',
            data(){
                return{
                    name:'',
                    link:'',
                    links:[],
                    fileSelected:null,
                    banner:"{{auth()->user()->banner??'https://twinelink.com/img/back2.jpg'}}",
                    
                    modal:false,
                    themes:[],
                    isLoading:false,
                    isAdding:false,
                    isEdit:false,
                    msg:'',
                    token:"{{Session::get('token')}}",
                    user_id:"{{auth()->user()->id}}",
                    bg:"{{auth()->user()->color->background_color}}",
                    textColors:"{{auth()->user()->color->text_color}}"
                    

                }
            },

            mounted(){
                this.allLinks()
                this.allTheme()
                
            },

            methods:{
                async allLinks(){
                    try {
                        this.isLoading=true
                        const res = await axios.get(`/api/links/${this.user_id}`,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
                        //console.log(res.data.data)
                        this.links = await res.data.data.user_links
                    } catch (error) {
                        this.isLoading=false
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },

                async allTheme(){
                    try {
                    
                        const res = await axios.get(`/api/themes`,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
                        //console.log(res.data.data)
                        this.themes = await res.data.data
                    } catch (error) {
                        
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },

                async changeTheme(id){
                    try {
                        const res = await axios.put(`/api/themes/${id}/${this.user_id}`,
                         
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )

                        if(res.data.status=="success"){
                            this.bg = res.data.data.background_color
                            this.textColors=res.data.data.text_color
                            let elem = document.getElementById('linkitems')
                            elem.scrollIntoView()
                            return
                        }
                    } catch (error) {
                        
                    }
                },

                onFileChange(event){
                    this.fileSelected = event.target.files[0]
                },
                toggleModal() {
                this.modal = !this.modal
                },
                async changeBanner(){
                    
                    try {
                        
                         let formdata  = new FormData()
                         
                         formdata.append('banner', this.fileSelected, this.fileSelected.name)
                         let res = await axios.post(`/api/user/update/banner/${this.user_id}`,formdata,
                         axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`

                         )
                            //console.log(res)
                         if(res.data.status=="success"){
                            this.banner = res.data.data
                            this.modal =false
                            return
                        }
                    } catch (error) {
                        
                    }
                }
                

                
                
               
            }
        })
    </script>
@endsection

