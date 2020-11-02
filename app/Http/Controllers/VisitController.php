<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visit;

class VisitController extends Controller
{
    public function store(Request $request, $link_id){
        $data['user_agent']=$request->userAgent();
        $data['link_id']= $link_id;
        Visit::create($data);
       return response()->json(['status'=>'success','code'=>200,'data'=>'visit added']);

    }
}
