@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="linkpage">
        
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <div class=" block lg:flex lg:justify-center mb-3 mx-auto">
                    <span class="text-gray-900 mr-2">My TwineLink:</span>
                <a href="{{URL::to('/'.auth()->user()->username)}}" class="text-gray-500" target="blank"><u>{{ url('') }}/{{auth()->user()->username}}</u></a>
                </div>
                <h3 class="text-gray-800 font-bold text-3xl leading-relaxed text-justify">Themes</h3>
                
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
               
                <div class="flex justify-center">
                    <div class="bg-black  w-full lg:w-6/12 rounded-lg pt-4 " style="min-height: 100vh">
                        <div class=" mx-auto  w-5/6  rounded-lg   " style="min-height: 100vh" :style="{background:bg}">
                            <div class="relative flex flex-col justify-center">
                                <div class="mx-auto">
                                    <img class="h-12 w-12 rounded-full align-middle " src="{{auth()->user()->picture==NULL?URL::asset('img/user.png'):auth()->user()->picture}}" loading="lazy" alt="">
                                </div>
                            <small class="text-center text-gray-500"><small>@</small>{{auth()->user()->username}}</small>
                              </div>
    
                              <div class="flex flex-col text-center pt-10 ">
                                
                                   <div v-for="item in links" @key="item.id">
                                   <a :href="item.link" class="  px-4 py-2 mb-5 capitaliz rounded-md border-b-4 border-green-600" type="button" :style="{backgroundColor:textColors, color:bg}">@{{item.name}}</a>
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
                    name:'',
                    link:'',
                    links:[],
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
                        this.links = await res.data.data
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
                }
                

                
                
               
            }
        })
    </script>
@endsection

