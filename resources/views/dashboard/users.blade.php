@extends('dashboard.layout')

@section('main')
 <div class="container mx-auto">
        
        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
              <div class="flex justify-between ">
               <div>
                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row max-w-sm">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                      <a class="text-xs font-bold uppercase px-5 py-3 shadow rounded block leading-normal text-white bg-orange-600" onclick="changeAtiveTab(event,'tab-all')">
                        <i class="fas fa-arrow-up text-base mr-1"></i>  All Users
                      </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                      <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-orange-600 bg-white" onclick="changeAtiveTab(event,'tab-userlinks')">
                        <i class="fas fa-arrow-down text-base mr-1"></i> User Links
                      </a>
                    </li>
                    
                  </ul>
               </div>
               
              </div>
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow rounded">
                <div class="px-4 py-5 flex-auto">
                  <div class="tab-content tab-space">
                    <div class="block overflow-x-auto" id="tab-all">
                        <table class="overflow-x-auto ">
                            <thead class="">
                                <th class="w-1/6 px-4 py-2 font-normal">Name</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Email</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Theme</th>
                                
                                
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr class="">
                                  <td class="px-4 py-2 text-center font-light">
                                      {{$item->username}}
                                  </td>
                                  <td class="px-4 py-2 text-center font-light">
                                      {{$item->email}}
                                  </td>
                                  <td class="px-4 py-2 text-center font-light" style="background:{{$item->color->background_color}}">
                                     <button class="font-bold" ></button> 
                                  </td>
                                  
                                 
                              </tr>
                                @endforeach
                            </tbody>
                           </table>
                           <div>
                             {{$users->links()}}
                           </div>
                    </div>


                    <div class="hidden  overflow-x-auto" id="tab-userlinks">
                        <table class="table-fixed overflow-x-auto">
                            <thead class="">
                                <th class="w-1/6 px-4 py-2 font-normal">Name</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Email</th>
                                <th class="w-1/6 px-4 py-2 font-normal">Total Links</th>
                                
                                
                            </thead>
                            <tbody>
                              @foreach ($userlinks as $item)
                              <tr class="">
                                <td class="px-4 py-2 text-center font-light">
                                    {{$item->username}}
                                </td>
                                <td class="px-4 py-2 text-center font-light">
                                    {{$item->email}}
                                </td>
                                <td class="px-4 py-2 text-center font-light">
                                    {{$item->total_links}}
                                </td>
                                
                            </tr>
                              @endforeach
                            </tbody>
                           </table>
                          
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
         
    </div>
    <script type="text/javascript">
    function submitForm(e){
        e.preventDefault()
        const from = document.querySelector("#from").value
        console.log(from)
        const to =document.querySelector('#to').value
        window.location.href = `http://localhost:8000/dashboard/transactions/${from}/${to}`
    }
        function changeAtiveTab(event,tabID){
          let element = event.target;
          while(element.nodeName !== "A"){
            element = element.parentNode;
          }
          ulElement = element.parentNode.parentNode;
          aElements = ulElement.querySelectorAll("li > a");
          tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
          for(let i = 0 ; i < aElements.length; i++){
            aElements[i].classList.remove("text-white");
            aElements[i].classList.remove("bg-orange-600");
            aElements[i].classList.add("text-orange-600");
            aElements[i].classList.add("bg-white");
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
          }
          element.classList.remove("text-orange-600");
          element.classList.remove("bg-white");
          element.classList.add("text-white");
          element.classList.add("bg-orange-600");
          document.getElementById(tabID).classList.remove("hidden");
          document.getElementById(tabID).classList.add("block");
        }
      </script>

      
        
    </div>
</div>
@endsection