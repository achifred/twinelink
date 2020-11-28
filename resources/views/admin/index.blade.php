@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="linkpage">

        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">


                <div class=" block lg:flex lg:justify-around mb-3 mx-auto">
                    <h3
                        class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 mb-2 rounded focus:outline-none focus:shadow-outline">
                        Page Impression: <span>@{{ link_impression }}</span></h3>

                </div>
                <div class=" block lg:flex lg:justify-center mb-3 mx-auto">
                    <span class="text-gray-600 mr-2 font-bold">My TwineLink:</span>
                    
                    <div class="flex">
                        <a href="{{ URL::to('/' . auth()->user()->username) }}" class="text-gray-500"target="blank" >
                            <input type="text" value="{{ url('') }}/{{ auth()->user()->username }}" id="copylink" class="appearance-none cursor-pointer bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" readonly>
                       </a>
                       <button title="copy link" @click.prevent="copyText" class=" text-gray-600 font-bold  focus:outline-none focus:shadow-outline" id="linkhref" ><i class="fa fa-copy"></i></button>
                    </div>
                       
                </div>
                <div class=" block lg:flex lg:justify-center mb-3 mx-auto">

                    <a href="{{ URL::to('/admin/url') }}" class="text-gray-500 italic text-sm" >
                        Have a song, podcast, video to promote? <u class="text-green-600 font-extrabold"> Create a smart link</u></a>
                </div>
                <div class=" w-full flex justify-center">
                    <form v-if="isEdit" class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3">

                        <small v-if="isAdding">editing...</small>

                        <div v-if="isError" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-700">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-bell"></i>
                            </span>
                            <span v-if="msg.name" class="inline-block align-middle mr-8">
                                @{{msg.name[0] }}
                                @{{ msg.link?msg.link[0]:'' }}
                            </span>
                            <span v-else-if="msg.link" class="inline-block align-middle mr-8">
                                @{{msg.link[0] }}
                                @{{ msg.name?msg.name[0]:'' }}
                            </span>
                            <span v-else class="inline-block align-middle mr-8">
                                @{{msg }}
                                
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                                onclick="closeAlert(event)">
                                <span>×</span>

                            </button>
                        </div>
                        <div class=" border-b border-green-500 py-2 mb-4">
                            <label class="block text-gray-500 text-sm  font-extrabold mb-2" for="name"> Title</label>
                            <input type="text" name="name" id="name"
                                class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                :value="editLink.name" required>
                        </div>

                       <div class="block lg:flex justify-around">
                        
                        <div class="flex justify-around border-b border-green-500 py-2 mb-4 ">
                            <h5>Icon</h5>
                            <v-select :options="icons" label="icon_name" v-model="icon_id"
                                class=" bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none">
                                <template slot="option" slot-scope="option">
                                    <div class="flex justify-around">
                                        <img :src="option.icon_path" />
                                        <h5 class="text-gray-600"> @{{ option . icon_name }}</h5>
                                    </div>
                                </template>
                            </v-select>


                        </div>
                        <div class=" border-b border-green-500 py-2 mb-6">
                            <label class="block text-gray-500 text-sm font-bold mb-2" for="password"> Link</label>
                            <input type="text" name="link" id="link"
                                class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                :value="editLink.link" required>
                        </div>
                       </div>
                        <div class=" flex flex-wrap text-center ">
                            <button @click.prevent="updateLink(editLink.id)"
                                class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Edit Link
                            </button>

                        </div>

                    </form>
                    <form v-else class="bg-white rounded  px-8 pt-6 pb-8 mb-4 mt-3">
                        <h3 class="text-center font-extrabold text-gray-600 text-2xl">Add your social media presence</h3>
                        <small v-if="isAdding">adding...</small>
                        <div v-if="isError" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-700">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-bell"></i>
                            </span>
                            <span v-if="msg.name" class="inline-block align-middle mr-8">
                                @{{msg.name[0]}}
                                @{{ msg.link?msg.link[0]:''}}
                            </span>
                            <span v-else-if="msg.link" class="inline-block align-middle mr-8">
                                @{{msg.link[0]}}
                                @{{ msg.name?msg.name[0]:''}}
                            </span>
                            <span v-else class="inline-block align-middle mr-8">
                                @{{msg}}
                                
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                                onclick="closeAlert(event)">
                                <span>×</span>

                            </button>
                        </div>
                        <div class=" border-b border-green-500 py-2 mb-4">

                            <input type="text" name="name" id="name" v-model="name"
                                class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                placeholder="Tittle eg twitter, instagram etc" required>
                        </div>

                        <div class="block lg:flex justify-around">
                            
    
                            <div class=" flex justify-around border-b border-green-500 py-2 mb-4 ">
                                <h5 class="text-gray-600 " >Icon</h5>
                                <v-select :options="icons" label="icon_name" v-model="icon_id"
                                    class=" bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none">
                                    <template slot="option" slot-scope="option">
                                        <div class="flex justify-around">
                                        <img :src="option.icon_path" />
                                        @{{ option . icon_name }}
                                        </div>
                                    </template>
                                </v-select>
    
    
                            </div>

                            <div class="  border-b border-green-500 py-2 mb-4 ">
                                <div class="flex">
                                   
                                    <input type="text" name="https" id="https" 
                                    class="appearance-none bg-transparent border-none w-1/2 text-gray-500 -ml-3   focus:outline-none"
                                    value="https://" readonly>
                                
                                <input type="text" name="link" id="link" v-model="link"
                                    class="appearance-none bg-transparent border-none w-full text-gray-500 -ml-12 lg:-ml-20 py-1 px-2 leading-tight focus:outline-none"
                                    placeholder="link here eg. example.com" required>
                                </div>
                            </div>

                        </div>

                        

                        <div class=" flex flex-wrap text-center ">
                            <button @click.prevent="addLink"
                                class="bg-green-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Link
                            </button>

                        </div>

                    </form>
                </div>
                <div class="block lg:flex  flex-wrap  ">

                    <div class="w-full lg:w-6/12 container mx-auto  px-4 py-6" v-for="item in links" @key="item.id">
                        <div
                            class="relative rounded shadow-lg hover:shadow-2xl text  bg-white  border-green-600 border-l-8  z-10 break-words">


                            <p class="capitalize text-center text-gray-700 pt-8 text-xl font-bold">@{{ item . name }}</p>


                            <p class="text-gray-500 px-4 text-center ">@{{ item . link }}</p>



                            <div class="flex justify-around flex-wrap ">
                                <button class="text-green-600  mb-6 mt-6"><i
                                        class="fa fa-eye"></i>@{{ item . visits_count }}</button>
                                <a :href="'/admin/link/stats/'+item.id" class="text-gray-600  mb-6 mt-6"><i
                                        class="fa fa-chart-line"></i></a>
                                <button @click.prevent="deleteLink(item.id)" class="text-red-600  mb-6 mt-6"><i
                                        class="fa fa-trash"></i></button>
                                <button @click.prevent="showEdit(item.id)" class="text-blue-600 mb-6 mt-6"><i
                                        class="fa fa-edit"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-full lg:w-6/12 contaniner mx-auto ">
                <div class="block lg:flex  ">

                    <div class=" w-full border-l-4 border-green-600 shadow-2xl min-h-screen lg:mt-5  rounded-lg  ml-auto mr-auto lg:w-8/12"
                        style="background:{{ auth()->user()->color->background_color }}">
                        <div class="relative flex flex-col justify-center">

                            <div class=" w-full h-32  bg-center bg-cover bg-no-repeat"
                                style='background-image: url("{{ auth()->user()->banner == null ? URL::asset('img/back2.jpg') : auth()->user()->banner }}");'>
                                <div class=" flex justify-center text-center ">
                                    <img class="h-20 w-20  rounded-full align-middle m-20 ml-20 lg:ml-20"
                                        src="{{ auth()->user()->picture == null ? URL::asset('img/user.png') : auth()->user()->picture }}"
                                        alt="">
                                </div>
                            </div>
                            <small
                                class="text-center mt-12 text-gray-500"><small>@</small>{{ auth()->user()->username }}</small>
                        </div>
                        <div class="flex flex-col text-center pt-5 ">
                            <div class="container mx-auto ">
                                <div v-for="item in links" @key="item.id" >
                                    <div  class="lg:px-4 lg:py-2 border-b-4 w-10/12 mx-auto border-green-600 rounded  mb-4 "
                                        style=" background-color:{{ auth()->user()->color->text_color }};color:{{ auth()->user()->color->background_color }}; ">
                                        <span class="text-xl inline-block mr-2 align-middle">
                                            <img :src="item.icon" alt="">
                                        </span>
                                        <span class="inline-block align-middle mr-3">
                                            <a :href="item.link" target="blank" class="capitalize"> @{{ item . name }}</a>
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
            el: '#linkpage',
            data() {
                return {
                    name: '',
                    link: '',
                    icon_id: '',
                    iconid:'',
                    links: [],
                    link_impression: '',
                    isLoading: false,
                    isAdding: false,
                    isEdit: false,
                    isError: false,
                    msg: '',
                    icons: [],
                    token: "{{ Session::get('token') }}",
                    user_id: "{{ auth()->user()->id }}",
                    editLink: {}

                }
            },

            mounted() {
                this.allLinks()
                this.allicons()

            },
 
            methods: {
                copyText(){
                    let text = document.getElementById('copylink')
                    text.select()
                    text.setSelectionRange(0, 99999)
                    document.execCommand("copy")

                    // let element = document.getElementById('linkhref')
                    // element.addEventListener('click',function(event) {
                    //     event.target.classList.remove("text-gray-600")
                    //     event.target.classList.add("text-green-600")
                    // })
                    
                },
                async allLinks() {
                    try {
                        this.isLoading = true
                        const res = await axios.get(`/api/links/${this.user_id}`,
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )
                        
                        let data = await res.data.data
                        this.links = data.user_links
                        this.link_impression = data.link_impression
                    } catch (error) {
                        this.isLoading = false
                        //console.log(error)
                        this.msg = 'something went wrong'
                    }
                },
                async allicons() {
                    try {
                        this.isLoading = true
                        const res = await axios.get(`/api/icons/social`,
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )
                        
                        let data = await res.data.data
                        this.icons = data

                    } catch (error) {
                        this.isLoading = false
                        //console.log(error)
                        this.msg = 'something went wrong'
                    }
                },

                onFileSelect(event) {

                    this.fileSelected = event.target.files[0]
                },

                async addLink() {
                    try {

                        this.isAdding = true
                        let formdata = new FormData()
                        let link = `${document.getElementById('https').value}${this.link}`
                        this.iconid = this.icon_id.id
                        if(this.iconid==null||undefined){
                            this.iconid=''
                        }
                        
                        formdata.append('user_id', this.user_id)
                        formdata.append('name', this.name)
                        formdata.append('link', link)
                        formdata.append('icon_id', this.iconid)
                        const res = await axios.post(`/api/links`, formdata,
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )
                        
                        if (res.data.status == "success") {
                            this.isAdding = false
                            this.links.push(res.data.data)
                            this.name = '',
                                this.link = ''
                            return
                        }
                        this.isAdding = false,
                        this.isError = true
                        this.msg = res.data.error
                        //console.log(this.msg)
                    } catch (error) {
                        this.isAdding = false
                        this.isError = true
                        //console.log(error)
                        this.msg='something went wrong'
                    }
                },

                async showEdit(id) {
                    try {
                        this.isLoading = true

                        const res = await axios.get(`/api/links/show/${id}`,
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )

                        this.editLink = await res.data.data
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    } catch (error) {
                        this.isLoading = false

                        this.msg = 'something went wrong'
                    }
                    this.isEdit = true
                },
                async updateLink(id) {
                    try {
                        this.isAdding = true
                        const res = await axios.put(`/api/links/${id}`, {
                                link: document.getElementById('link').value,
                                name: document.getElementById('name').value,
                                icon_id: this.icon_id.id

                            },
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )

                        if (res.data.status == "success") {
                            this.isAdding = false
                            this.isEdit = false
                            const index = this.links.findIndex((item) => item.id == id)
                            if (index == -1) return
                            this.links.splice(index, 1, res.data.data[0])
                            return
                        }
                        this.isAdding = false
                        this.isError = true
                        this.msg = res.data.error
                    } catch (error) {
                        this.isAdding = false
                        this.msg = "something went wrong"
                    }
                },

                async deleteLink(id) {
                    try {
                        const res = await axios.delete(`/api/links/${id}`,
                            axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`
                        )
                        if (res.data.status == "success") {
                            this.links = this.links.filter((item) => item.id != id)
                        }
                    } catch (error) {

                    }
                },



            }
        })

    </script>
@endsection
