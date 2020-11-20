@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="linkeditpage">
        @include('layouts.alert')
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <h3 class="text-center">Edit  Link</h3>
               
                <div class=" w-full flex justify-center">
                   
                <form class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3" action="{{URL::to('/admin/url/'.$url->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            
                            <div class=" border-b border-green-500 py-2 mb-4">
                                <label class="text-gray-600" for="url">Url</label>
                            <input type="text" name="url" id="url"  class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"  value="{{$url->url}}" required>
                            </div>
                
                            <div class="border-b border-green-500 py-2 mb-4 ">
                                <input type="hidden" name="icon_id" :value="icon_id.id">
                                <label class="text-gray-600" for="cover_art">Select an icon</label>
                                <img src="{{$url->icon_path}}" alt="" class="align-middle">
                                <v-select :options="icons"  label="icon_name" v-model="icon_id" class=" bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" >
                                    <template slot="option"  slot-scope="option">
                                        <div class="flex justify-around">
                                            <img :src="option.icon_path" />
                                            <h5> @{{option.icon_name}}</h5>
                                        </div>
                                    </template>
                                  </v-select>
                            </div>
                            
                            <div class=" flex flex-wrap text-center ">
                                <button  class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Update Url
                                </button>
                              
                            </div>
                            
                        </form>
                    </div>
               
            </div>

          
            


        </div>
    </div>
@endsection

@section('script')
    <script>
        new Vue({
            el:'#linkeditpage',
            data(){
                return{
                    icon_id:'',
                
                    icons:[],
                    token:"{{Session::get('token')}}",
                    user_id:"{{auth()->user()->id}}",
                    
                }
            },

            mounted(){
                
                this.allicons()
                
            },

            methods:{
               
                async allicons(){
                    try {
                        this.isLoading=true
                        const res = await axios.get(`/api/icons/media`,
                        axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                        )
                        console.log(res.data.data)
                        let data= await res.data.data
                        this.icons = data
                        
                    } catch (error) {
                        this.isLoading=false
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },
  
            }
        })
    </script>
@endsection