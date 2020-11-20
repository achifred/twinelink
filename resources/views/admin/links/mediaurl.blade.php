@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="linkpage">
        
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                
                <div class=" w-full flex container mx-auto flex-wrap">
                   
                    <form class="bg-white rounded  container mx-auto px-8 pt-6 pb-8 mb-4 mt-3" method="POST">
                        <h3 class="text-center text-gray-600 font-extrabold text-2xl mb-3">Create a link for your songs, podcasts, videos etc</h3>
                            <small v-if="isAdding">adding...</small>
                            <div v-if="isError" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-700">
                                <span class="text-xl inline-block mr-5 align-middle">
                                  <i class="fas fa-bell"></i>
                                </span>
                                <span class="inline-block align-middle mr-8">
                                  @{{msg}}
                                </span>
                                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                  <span>×</span>
                              
                                </button>
                              </div>
                            <div class=" border-b border-green-500 py-2 mb-4">
                        
                                <input type="text" name="tittle" id="tittle" v-model="tittle" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="title of song, video, podcast etc.." required>
                            </div>
                            

                            <div  class="block lg:flex justify-around">

                                <div class=" flex justify-around border-b border-green-500 py-2 mb-4 ">
                                   <h5 class="text-gray-600">Icon</h5>
                                    <v-select :options="icons"  label="icon_name" v-model="icon_id" class=" bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" >
                                        <template slot="option"  slot-scope="option">
                                            <div class="flex justify-around">
                                                <img :src="option.icon_path" />
                                                <h5> @{{option.icon_name}}</h5>
                                            </div>
                                        </template>
                                      </v-select>
                                        
                                      
                                </div>
                               <div class="flex">
                                <div class="border-b border-green-500 py-2 mb-4 ">
                                
                                    <input type="text" name="url" id="url" v-model="url" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none " placeholder=" enter url to your content" required>
                                </div>
                                
                                <button @click.prevent="addUrlToArray" class=" text-gray-600 font-bold text-sm  rounded focus:outline-none focus:shadow-outline" >
                                    add
                                </button>
                               </div>
                            </div>

                            <div class="flex flex-wrap">
                                <div class=" py-2 mb-4 mr-2">
                                
                                    <input type="file" name="cover_art" ref="fileInput"  @change="onCoverartSelect"   style="display: none">
                                    <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  @click.prevent="$refs.fileInput.click()">
                                        Add cover art
                                    </button>
                                </div>

                                <div class=" py-2 mb-4 ">
                                
                                    <button @click.prevent="addUrl" class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                                        Create Link
                                    </button>
                                  
                                </div>
    
                                <!--div class=" py-2 mb-4 ">
                                    
                                    <input type="file" name="preview" ref="previewInput"  @change="onPreviewSelect"   style="display: none">
                                    <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline"  @click.prevent="$refs.previewInput.click()">
                                        Add a Preview
                                    </button>
                                </div-->
                            </div>

                            
                           
                    
                            
                            
                            
                            
                           
                           
                            
                        </form>
                    </div>
                <div class="block lg:flex container mx-auto flex-wrap mb-3 ">
                   
                   
                    <div class="w-full lg:w-9/12 container mx-auto mb-3  " v-for="item in links" @key="item.id">
                        <div class=" relative rounded shadow-lg hover:shadow-2xl   bg-white  border-green-600 border-l-8  z-10 break-words">
                            
                                <div class="flex justify-center ">
                                    <h3 class="capitalize text-center text-gray-700  text-xl font-bold">@{{item.tittle}}</h3>
                                   <a :href="'/admin/url/tittle/'+item.id" class="ml-2 text-blue-600"> <i class="fa fa-pencil-alt"></i>  </a>
                                   <a :href="'/admin/url/tittle/delete/'+item.id" class="ml-2 text-red-600"> <i class="fa fa-trash"></i>  </a>
                                </div>
 

                        <div v-for="url in item.urls" @key="url.id" >
                            <div class=" flex  justify-between px-4 py-2 border-b-4  mx-auto border-green-600 rounded  mb-4 " style=" background-color:{{auth()->user()->color->text_color}};color:{{auth()->user()->color->background_color}}; ">
                                <div class="flex justify-around">
                                    <span class="text-xl  mr-2 align-middle">
                                        <img :src="url.icon" alt=""> 
                                    </span>
                                    <span class="text-gray-500 hidden lg:block capitalize">@{{url.icon_name}}</span>
                                </div>
                                <div class=" flex justify-around  text-gray-500 hover:text-gray-900">
                                    <button  class="text-green-600 mr-2 "><i class="fa fa-eye"></i>@{{url.visit_count}}</button>
                                    <a :href="'/admin/url/stats/'+url.id" class="text-gray-600  mr-2 "><i class="fa fa-chart-line"></i></a>
                            
                                    <a :href="'/admin/url/edit/'+url.id" class="mr-2 text-blue-600"   > <i class="fa fa-pencil-alt"></i> </a>
                                    <a :href="'/admin/url/delete/'+url.id" class="text-red-600" > <i class="fa fa-trash"></i> </a>
                                </div>
                                
                              </div>
                               
                                
                               
                          
                           </div>
                        
                          
                           <div class="flex  justify-around pb-5">
                            <div class=" border-b border-green-500 py-2 mb-4">
                                <input type="text" :value="`https://twinelink.com/${username}/${item.tittle}`" id="copy-text" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" readonly>
                                
                            </div>
                           
                            
                            <button @click.prevent="copyText" class=" text-gray-600 font-bold  rounded focus:outline-none focus:shadow-outline">copy url</button>
                       </div>
                           
                          

                          
                        </div>
                    </div>

                </div>
            </div>
 
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <div class="block lg:flex flex-wrap ">
                    <div v-if="linklength <= 0" class="w-full   h-auto lg:mt-5   mb-2 ml-auto mr-auto lg:w-8/12" >
                        <h3 class="text-gray-600 font-extrabold text-4xl ">
                            You don't have any links yet. Create one
                        </h3>
                    </div>
                <div v-else  v-for="item in links" @key="item.id" class="w-full border-l-4 border-green-600 shadow-2xl h-auto lg:mt-5  rounded-lg mb-2 ml-auto mr-auto lg:w-8/12" style="background:{{auth()->user()->color->background_color}}" >
                    <div class="relative flex flex-col justify-center">
                        
                        <div class=" w-full h-64  bg-center bg-cover  bg-no-repeat" :style="{backgroundImage:'url(' + item.cover_art + ')'}">
                            <div class=" flex justify-center text-center ">
                                
                            </div>
                        </div>
                         
                         <div class="h-16 bg-white w-full">
                         <h4 class="text-center text-gray-600 pt-2">{{auth()->user()->username}} - @{{item.tittle}}</h4>
                            <h4 class="text-xs text-gray-500 text-center">Stream from your preferred platform</h4>
                         </div>
                    </div>
                    <div class="flex flex-col text-center pt-6 ">
                    <div class="container mx-auto ">
                        <div v-for="url in item.urls" @key="url.id" >
                            <div class=" flex  justify-between px-4 py-2 border-b-4 w-10/12 mx-auto border-green-600 rounded  mb-4 " style=" background-color:{{auth()->user()->color->text_color}};color:{{auth()->user()->color->background_color}}; ">
                                <div class="flex justify-around">
                                    <span class="text-xl  mr-2 align-middle">
                                        <img :src="url.icon" alt=""> 
                                    </span>
                                    <span class="text-gray-500 capitalize">@{{url.icon_name}}</span>
                                </div>
                                <span class=" align-middle mr-3 text-gray-500 hover:text-gray-900">
                                    <a :href="url.url"    target="blank"><i class="fa fa-play"></i> Play </a>
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
            el:'#linkpage',
            data(){
                return{
                    isAddUrl:false,
                    tittle:'',
                    url:'',
                    icon_id:'',
                    urls:[],
                    cover_art:null,
                    preview:null,
                    links:[],
                    link_impression:'',
                    isLoading:false,
                    isAdding:false,
                    isEdit:false,
                    isError:false,
                    msg:'',
                    icons:[],
                    token:"{{Session::get('token')}}",
                    user_id:"{{auth()->user()->id}}",
                    username:"{{auth()->user()->username}}",
                    editLink:{},
                    linklength:''

                }
            },

            mounted(){
                this.allUrls()
                this.allicons()
                
                
                
            },

            methods:{
                addUrlToArray(){
                    if(this.icon_id==""){
                            //this.isAdding=false
                            this.isError =true
                            this.msg ='Select an icon'
                            return
                        }
                    let data ={
                        "url":this.url,
                        "icon_id":this.icon_id.id
                    }
                    this.urls.push(data)
                    
                    this.url=""
                    this.icon_id=""
                },
                toggleUrlInput(){
                    this.isAddUrl = !this.isAddUrl
                },

                copyText(){
                    let text = document.getElementById('copy-text')
                    text.select()
                    text.setSelectionRange(0, 99999)
                    document.execCommand("copy")
                },
                async allUrls(){
                    try {
                        this.isLoading=true
                        const res = await axios.get(`/api/media/urls/${this.user_id}`,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
                        
                        let data= await res.data.data
                        this.links = data
                        this.linklength = data.length
                        
                    } catch (error) {
                        this.isLoading=false
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },
                async allicons(){
                    try {
                        this.isLoading=true
                        const res = await axios.get(`/api/icons/media`,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
    
                        let data= await res.data.data
                        this.icons = data
                        
                    } catch (error) {
                        this.isLoading=false
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },

                onCoverartSelect(event){
                    
                    this.cover_art = event.target.files[0]
                    //console.log(this.cover_art)
                },
                onPreviewSelect(event){
                    this.preview = event.target.files[0]
                },

                async addUrl(){
                    try {
                        
                        this.isAdding=true
                        // if (this.tittle='') {
                        //     this.isAdding=false
                        //     this.isError =true
                        //     this.msg ='tittle can not be empty'
                        //     return
                        // }
                        if(this.cover_art==null){
                            this.isAdding=false
                            this.isError =true
                            this.msg ='cover art can not be empty'
                            return
                        }
                        if(this.urls==[]){
                            this.isAdding=false
                            this.isError =true
                            this.msg ='cover art can not be empty'
                            return
                        }


                        

                        
                        let formdata = new FormData()
                            
                            formdata.append('cover_art',this.cover_art, this.cover_art.name)
                            //this.preview==null?'':formdata.append('preview', this.preview, this.preview.name)
                            formdata.append('user_id',this.user_id)
                            formdata.append('tittle',this.tittle)
                            formdata.append('url',JSON.stringify(this.urls) )
                            
                        const res = await axios.post(`/api/media/url`,formdata,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
                        
                        if(res.data.status=="success"){
                            this.isAdding=false
                            this.links.push(res.data.data)
                            this.linklength = this.links.length
                            this.tittle='',
                            this.urls=[]
                            
                            return
                        }
                        this.isAdding=false,
                        this.isError=true
                        this.msg=res.data.error
                    } catch (error) {
                        this.isAdding=false
                        this.isError=true
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },

              

            }
        })
    </script>
@endsection

