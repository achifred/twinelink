<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medialurl;
use App\MedialTittle;
use Validator;


class MedialurlController extends Controller
{
   public function allUrls($user_id){
        try {
            $data = MedialTittle::where('user_id',$user_id)->where('is_active',1)->get();
            $data->transform(function($item, $key){
                $urls = Medialurl::where('medialtittle_id',$item->id)->where('is_active',1)->get();
                $item->urls = $urls;
                return $item;
            });

            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function userUrls($user_id){
        try {
            $data = MedialTittle::where('user_id',$user_id)->where('is_active',1)->get();
            // $data->transform(function($item, $key){
            //     $urls = Medialurl::where('medialtittle_id',$item->id)->where('is_active',1)->get();
            //     $item->urls = $urls;
            //     return $item;
            // });

            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

     public function Urls($medialtittle_id){
        try {
            $data = MedialTittle::where('id',$medialtittle_id)->where('is_active',1)->get();
            $data->transform(function($item, $key){
                $urls = Medialurl::where('medialtittle_id',$item->id)->where('is_active',1)->get();
                $item->urls = $urls;
                return $item;
            });

            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function create(){
        return view('admin.links.mediaurl');
    }

    

    
    public function addUrl(Request $request){
        try {
            $rules =[
                'user_id'=>'required',
                'url'=>'required',
                'medialtittle_id'=>'required',
                 
            ];
            $request_body = $request->only(['user_id','url','medialtittle_id']);
            $is_valid = Validator::make($request_body,$rules);
            if($is_valid->fails()){
                return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            $urls = $request_body['url'];
            $user_id= $request_body['user_id'];
            $medialtittle_id=$request_body['medialtittle_id'];
            
            foreach ($urls as $item) {
                $req_body =[
                    'user_id'=>$user_id,
                    'medialtittle_id'=>$medialtittle_id,
                    'url'=>$item['url'],
                    'icon_id'=>$item['icon_id']
                ];
                 $res = Medialurl::create($req_body);
            }
            
            // if($res->id==NULL){
            //     return response()->json(['status'=>'fail','code'=>400,'error'=>'item not created']);
            // }
            
            $data['urls'] = Medialurl::where('medialtittle_id',$request_body['medialtittle_id'])->get();
            $data['media_attribute'] = MedialTittle::where('id',$request_body['medialtittle_id'])->pluck('cover_art','tittle','preview');
            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            throw $th;
            //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }


     
    public function updateUrl(Request $request,$url_id){
        try {
            $rules =[
                'user_id'=>'required',
                'url'=>'required|url',
                'medialtittle_id'=>'required',
                'icon_id'=>'required'   
            ];
            $request_body = $request->only(['user_id','url','medialtittle_id','icon_id']);
            $is_valid = Validator::make($request_body,$rules);
            if($is_valid->fails()){
                return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            
        
            $res = Medialurl::where('id',$url_id)->update($request_body);
            if(!$res){
                return response()->json(['status'=>'fail','code'=>400,'error'=>'item not updated']);
            }
            $data['urls'] = Medialurl::where('medialtittle_id',$request_body['medialtittle_id'])->get();
            $data['media_attribute'] = MedialTittle::where('id',$request_body['medialtittle_id'])->first();
            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

     public function destroy($id){
        try {
             Medialurl::destroy($id);
            
       return response()->json(['status'=>'success','code'=>200,'data'=>'url deleted']);
        } catch (\Throwable $th) {
            //throw $th;
             return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

}
