@extends('layouts.authlayout')

@section('content')
@include('layouts.authnav')
<div class="container mx-auto " id="reset">
    
    @include('layouts.alert')

    <div class=" top-0 w-full h-full bg-white"
    style="background-image:url( {{URL::asset('img/login.png')}}); background-size: 100%; background-repeat: no-repeat;">
        <div class="w-full max-w-xs mx-auto">
            
            <form class="bg-white rounded shadow px-8 pt-6 pb-8 mb-4 mt-40" >
                @csrf
                    <h3 class="text-center  font-bold text-xl text-gray-700 capitalize">enter your email address</h3>
                    <small class="text-teal-800 font-bold italic" v-if="isSending" >sending...</small>
                    <h3 class="text-gray-700 text-sm font-bold">@{{msg}}</h3>
                    <div class=" border-b border-orange-600 py-2 mb-6">
                        
                        <input type="email" v-model="email" name="email" id="email" class="appearance-none bg-transparent border-none w-full text-gray-500 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Email Address" required>
                    </div>
                    <div class=" flex flex-wrap text-center ">
                        <button @click.prevent="sendMail" class="bg-orange-500 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Request
                        </button>
                    <a class="inline-block align-baseline font-bold text-sm text-gray-700 py-3 px-4 hover:text-gray-500" href="{{URL::to('/register')}}">
                        Don't have an account? Create Account
                          </a>
                    </div>
                    
                </form>
            </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        new Vue({
            el:'#reset',
            data(){
                return{
                    isSending:false,
                    email:'',
                    msg:''
                }
            },

            methods:{
                async sendMail(){
                    try {
                        this.isSending=true
                        const res = await axios.post(`/api/resetmail`,{
                        email:this.email
                        })
                        if(res.data.status=="success"){
                            this.isSending=false
                            this.msg=res.data.data
                            return
                        }
                        this.isSending=false
                        this.msg='sorry try agaian'
                    } catch (error) {
                        this.isSending=false
                        this.msg='sorry an error occured'
                        
                    }
                }
            }
        })
    </script>
@endsection