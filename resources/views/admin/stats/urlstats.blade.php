@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="statspage">
        
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">
                <canvas id="bar-chart" height="280" width="600"></canvas>

                <div class="block lg:flex flex-wrap justify-center mt-5 ">
                    <div class=" w-full lg:w-6/12   px-4 py-6  ">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl border-b-4 border-green-600 ">
                            <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Link Clicks</h5>
                           
                            <div class=" flex px-6 py-2 ">
                               <div>
                               
                                <i class="fa fa-mouse  text-teal-700 "></i>
                               </div>
                            <p class="text-gray-700  text-base mb-4 px-4">@{{total_clicks}}</p>
                            </div>
                        </div>
                    </div>
                    <div class=" w-full lg:w-6/12   px-4 py-6  ">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl border-b-4 border-orange-600 ">
                            <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Link Clicks Today</h5>
                           
                            <div class=" flex px-6 py-2 ">
                               <div>
                                <i class="fa fa-redo text-orange-700 "></i>
                                <i class="fa fa-mouse  text-orange-700 "></i>
                               </div>
                            <p class="text-gray-700  text-base mb-4 px-4">@{{clicks_today}}</p>
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
            el:'#statspage',
            data(){
                return{
                   
                    isLoading:false,
                    
                    isError:false,
                    msg:'',
                    token:"{{Session::get('token')}}",
                    user_id:"{{auth()->user()->id}}",
                    clicks_count:[],
                    months:[],
                    total_clicks:'',
                    clicks_today:'',
                    url_id:"{{$url_id}}"
                    

                }
            },

            mounted(){
                //console.log(this.link_id)
                this.ChartData()
                
            },

            methods:{
                async ChartData(){
            try {
                this.isLoading=true
                const res = await axios.get(`/api/url/visit/stats/${this.url_id}/${this.user_id}`,
                axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                )
                //console.log(res)
                if(res.data.satus='success'){
                    this.isLoading=false
                    let data =  await res.data.data;
                    console.log(data)
                    data.clicks_per_Month.forEach(item => {
                        this.months.push(item.month)
                        this.clicks_count.push(item.clicks_per_Month)
                    });
                    this.clicks_today=data.clicks_today
                    this.total_clicks =data.total_clicks
                    this.barChart()
                }
                //this.isLoading=false
                
            //console.log(this.vendors)
            } catch (error) {
                this.isLoading=false
                //console.log(error)
            }
        },

        barChart(){
           
           let ctx = document.getElementById('bar-chart');
        
           let myChart = new Chart(ctx, {
               type: 'line',
               data: {
                   labels: this.months, 
                   datasets: [{
                       label: 'Url Clicks Per Month',
                       data: this.clicks_count ,
                       
               borderColor: "#2c7a7b",
                       borderWidth: 1
                   }]
               },
               options: { 
                   scales: {
                       yAxes: [{
                           ticks: {
                               beginAtZero: true
                           }
                       }]
                   }
               }
           });
           },

            
            }
        })
    </script>
@endsection

