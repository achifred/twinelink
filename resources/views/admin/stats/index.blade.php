@extends('layouts.dashboard')

@section('main')
    <div class="container relative mx-auto" id="statspage">
        <h3 class="text-center text-2xl text-gray-700 font-bold">Checkout Your Coverage</h3>
        <div class=" block lg:flex ">
            <div class="w-full lg:w-6/12 ml-auto mr-auto">

                <div class="block lg:flex flex-wrap justify-center mt-5 ">
                    <div class=" w-full lg:w-6/12   px-4 py-6  ">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl border-b-4 border-green-600 ">
                            <h5 class="font-bold text-gray-700 mb-2 px-6 py-4">Total Page Impression</h5>
                           
                            <div class=" flex px-6 py-2 ">
                               <div>
                               
                                <i class="fa fa-eye  text-teal-700 "></i>
                               </div>
                            <p class="text-gray-700  text-base mb-4 px-4">@{{total_page_impression}}</p>
                            </div>
                        </div>
                    </div>
                    <div class=" w-full lg:w-6/12   px-4 py-6  ">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-2xl border-b-4 border-orange-600 ">
                            <h5 class="font-bold text-gray-700 mb-2 px-6 py-4"> Page Impression Today</h5>
                           
                            <div class=" flex px-6 py-2 ">
                               <div>
                                <i class="fa fa-redo text-orange-700 "></i>
                                <i class="fa fa-eye  text-orange-700 "></i>
                               </div>
                            <p class="text-gray-700  text-base mb-4 px-4">@{{today_page_impression}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <canvas id="bar-chart" height="280" width="600"></canvas>
                <canvas id="today-line-chart" height="280" width="600"></canvas>
                <canvas id="line-chart" height="280" width="600"></canvas>

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
                    
                    months:[],
                    impression_count:[],
                    linkNames:[],
                    visit_count:[],
                    today_linkNames:[],
                    today_visit_count:[],
                    total_page_impression:'',
                    today_page_impression:'',
                    
                    

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
                const res = await axios.get(`/api/link/stats/${this.user_id}`,
                axios.defaults.headers.common['Authorization']=`Bearer ${this.token}`
                )
                //console.log(res.data.data)
                if(res.data.satus='success'){
                    this.isLoading=false
                    let data =  await res.data.data;
                    data.page_impression.forEach(item => {
                        this.months.push(item.month)
                        this.impression_count.push(item.impression_count)
                    });

                    data.views_per_link.forEach(item => {
                        this.linkNames.push(item.name)
                        this.visit_count.push(item.visit_count)
                    });
                    data.views_per_link_today.forEach(item => {
                        this.today_linkNames.push(item.name)
                        this.today_visit_count.push(item.visit_count)
                    });
                    this.total_page_impression=data.total_page_impression
                    this.today_page_impression =data.today_page_impression
                    this.barChart()
                    this.viewsPerLinkChart()
                    this.todayViewsPerLinkChart()
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
               type: 'bar',
               data: {
                   labels: this.months, 
                   datasets: [{
                       label: 'Page Impression Per Month',
                       data: this.impression_count ,
                       
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


           viewsPerLinkChart(){
           
           let ctx = document.getElementById('line-chart');
        
           let myChart = new Chart(ctx, {
               type: 'line',
               data: {
                   labels: this.linkNames, 
                   datasets: [{
                       label: 'Views Per Links',
                       data: this.visit_count ,
                       
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

           todayViewsPerLinkChart(){
           
           let ctx = document.getElementById('today-line-chart');
           
        
           let myChart = new Chart(ctx, {
               type: 'line',
               data: {
                   labels: this.today_linkNames, 
                   datasets: [{
                       label: 'Today Views Per Links',
                       data: this.today_visit_count ,
                       
               borderColor: "#dd6b20",
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

