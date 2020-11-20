<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedialTittle;
use App\Medialurl;
use Validator;
use Image;
class MedialTittleController extends Controller
{
     public function addMedia($folderName, $image, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $image->getClientOriginalName();
        Image::make($image)->save($path. $filename);
        //$image->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }
    public function addPreview($folderName, $audio, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $audio->getClientOriginalName();
        //Image::make($image)->save($path. $filename);
        $audio->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }
    public function addTittle(Request $request){
        try {
            $rules =[
                'user_id'=>'required',
            'tittle'=>'required',
            'cover_art'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ];
            $request_body = $request->only(['user_id','tittle','cover_art','preview']);
            $is_valid = Validator::make($request_body,$rules);
            if($is_valid->fails()){
                return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            $cover_art = $request->file('cover_art');
                $path = $this->addMedia('uploads/coverart/',$cover_art,env('APP_URL'));
                $request_body['cover_art']=$path;
            if($request->hasFile('preview')){
                //TODO OPTIMIZE INTO EVENTS
                $preview = $request->file('preview');
                $path = $this->addPreview('uploads/preview/',$preview,env('APP_URL'));
                $request_body['preview']=$path;
            }
            $res = MedialTittle::create($request_body);
            if($res->id==NULL){
                return response()->json(['status'=>'fail','code'=>400,'error'=>'item not created']);
            }
            return response()->json(['status'=>'success','code'=>200,'data'=>$res->id]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }

    }

    public function edit($id){
        try {
            $data['tittle'] = MedialTittle::where('id',$id)->first();
            return view('admin.links.edit', $data);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
        }
    }
    public function updateTittle(Request $request, $id){
        try {
            $rules =[
                
            'tittle'=>'required',
            'cover_art'=>'image|mimes:jpeg,png,jpg,gif|max:5048',
        ];
            $request_body = $request->only(['tittle','cover_art','preview']);
            $is_valid = Validator::make($request_body,$rules);
            if($is_valid->fails()){
                return redirect()->back()->withErrors($is_valid)->withInput();
                //return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            if($request->hasFile('cover_art')){
                $cover_art = $request->file('cover_art');
                $path = $this->addMedia('uploads/coverart/',$cover_art,env('APP_URL'));
                $request_body['cover_art']=$path;
            }
            if($request->hasFile('preview')){
                //TODO OPTIMIZE INTO EVENTS
                $preview = $request->file('preview');
                $path = $this->addPreview('uploads/preview/',$preview,env('APP_URL'));
                $request_body['preview']=$path;
            }
            $res = MedialTittle::where('id',$id)->update($request_body);
            if(!$res){
                return redirect()->back()->withErrors(['errors'=>'item not updated']);
                //return response()->json(['status'=>'fail','code'=>400,'error'=>'item not updated']);
            }
            $data= MedialTittle::where('id',$id)->get();
            return redirect('admin/url');
            //return response()->json(['status'=>'success','code'=>200,'data'=>$data]);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
            //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }

    }

    public function deleteTittle($id){
        try {
             MedialTittle::destroy($id);
            Medialurl::where('medialtittle_id',$id)->delete();
            return redirect('admin/url');
       //return response()->json(['status'=>'success','code'=>200,'data'=>'link deleted']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
            //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

}
