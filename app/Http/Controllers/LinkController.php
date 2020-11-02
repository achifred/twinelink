<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;
use Validator;

class LinkController extends Controller
{
    public function index(){
        $data['links'] = Auth::user()->links()
        ->withCount('visits')
        ->with('latest_visit')
        ->get();
        
        return view('admin.index',$data);
    }
    public function create(){
        return view('links.create');
    }
    public function store(Request $request){
       try {
        $rules =['name'=>'required','link'=>'required|url','user_id'=>'required'];
        $data = $request->only(['name','link','user_id']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return response()->json(['status'=>'fail','code'=>400,'errors'=>$isValid->messages()]);
        }

        $link = Link::create($data);
       return $link?response()->json(['status'=>'success','code'=>200,'data'=>$link]):response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
       } catch (\Throwable $th) {
           throw $th;
       }

    }

    public function edit($link){
       $data = Link::where('id',$link)->first();
       return response()->json(['status'=>'success','code'=>200,'data'=>$data]);

    }

    public function update(Request $request,$link){
       
        try {
            $rules =['name'=>'required','link'=>'required|url'];
        $data = $request->only(['name','link']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return response()->json(['status'=>'fail','code'=>400,'errors'=>$isValid->messages()]);
        }
       $res = Link::where('id',$link)->update($data);
       $resp =Link::where('id',$link)->get();
        return $res?response()->json(['status'=>'success','code'=>200,'data'=>$resp]):response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function userLinks($user_id){
        $data = Link::where('user_id',$user_id)->withCount('visits')->get();
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
    }
    public function destroy($link){
       Link::destroy($link);
       return response()->json(['status'=>'success','code'=>200,'data'=>'link deleted']);
        
    }
}
