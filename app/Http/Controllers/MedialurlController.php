<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medialurl;
use App\MedialTittle;
use Validator;
use Image;
use App\Icon;
use App\User;
use App\Link;

class MedialurlController extends Controller
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
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

    public function userUrls($user_id){
        try {
            $data = MedialTittle::where('user_id',$user_id)->where('is_active',1)->orderBy('id','DESC')->get();
            $data->transform(function($item, $key){
                $item->urls = Medialurl::where('medialtittle_id',$item->id)
                ->where('is_active',1)
                ->with('icon')->withCount('visit')->get();
                // $urls->transform(function($item, $key){
                //     $icon = Icon::where('id',$item->icon_id)->get();
                //     if(count($icon)>0){ 
                //         $item->icon = $icon[0]->icon_path;
                //         $item->icon_name = $icon[0]->icon_name;
                //     }
                   
                //     return $item;
                // });
                 
                return $item;
            });

            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
           // throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

     public function Urls(User $user, MedialTittle $tittle){
        try {
            
            $links = MedialTittle::where('id',$tittle->id)->where('is_active',1)->get();
            $links->transform(function($item, $key){
                $item->urls = Medialurl::where('medialtittle_id',$item->id)
                ->where('is_active',1)
                ->with('icon')
                ->withCount('visit')->get();
                // $urls->transform(function($item, $key){
                //     $icon = Icon::where('id',$item->icon_id)->get();
                //     if(count($icon)>0){
                //         $item->icon = $icon[0]->icon_path;
                //         $item->icon_name = $icon[0]->icon_name;
                //     }
                    
                //     return $item;
                // });
                 
                return $item;
            });

            $data['user_social_links']= Link::where('user_id',$user->id)->with('icon')->get();
            $data['links'] = $links;
            $data['username'] = $user->username;
            $data['tittle'] = $tittle->tittle;
            $data['background_color'] = $user->color->background_color;
            $data['text_color'] = $user->color->text_color;
            //return $data;
            return view('admin.links.url', $data);
            //return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! An error has occured']);
        }
    }


    public function create(){
        return view('admin.links.mediaurl');
    }

    public function edit($id){
        try {
            $data['url'] = Medialurl::where('id',$id)->with('icon')->first();
            return view('admin.links.urledit', $data);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
        }
    }
    

    
    public function addUrl(Request $request){
        try {
            $rules =[
                'user_id'=>'required',
                'tittle'=>'required',
                'url'=>'required',
                'cover_art'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048',
                 
            ];
            $request_body = $request->only(['user_id','url','tittle','cover_art','preview']);
            $is_valid = Validator::make($request_body,$rules);
            
            if($is_valid->fails()){
                return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            $urls = json_decode($request_body['url']);
            
            $user_id= $request_body['user_id'];
            
            // add tittle and return id
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
            $medialtittle_id=$res->id;
            
            foreach ($urls as $item) {
                $req_body =[
                    'user_id'=>$user_id,
                    'medialtittle_id'=>$medialtittle_id,
                    'url'=>$item->url,
                    'icon_id'=>$item->icon_id
                ];
                 $res = Medialurl::create($req_body);
            }
            
        
            $tittle = MedialTittle::where('id',$medialtittle_id)->where('is_active',1)->get();
            
            $tittle->transform(function($item, $key){
                $item->urls = Medialurl::where('medialtittle_id',$item->id)
                ->where('is_active',1)
                ->with('icon')
                ->withCount('visit')->get();
                // $urls->transform(function($item, $key){
                //     $icon = Icon::where('id',$item->icon_id)->get();
                //     if(count($icon)>0){
                //         $item->icon = $icon[0]->icon_path;
                //     $item->icon_name = $icon[0]->icon_name;
                //     }
                    
                //     return $item;
                // });
                 
                return $item;
            });
            

            return response()->json(['status'=>'success','code'=>200,'data'=>$tittle[0]]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }


     
    public function updateUrl(Request $request,$url_id){
        try {
            $rules =[
               
                'url'=>'required|url',
                
                   
            ];
            $request_body = $request->only(['url','icon_id']);
            
            $is_valid = Validator::make($request_body,$rules);
            if($is_valid->fails()){
                return redirect()->back()->withErrors($is_valid)->withInput();
                //return response()->json(['status'=>'fail','code'=>400,'error'=>$is_valid->messages()]);
            }
            
        
            $res = Medialurl::where('id',$url_id)->update($request_body);
            if(!$res){
                return redirect()->back()->withErrors(['errors'=>'opps!! item not updated']);
                //return response()->json(['status'=>'fail','code'=>400,'error'=>'item not updated']);
            }
            return redirect('admin/url');
            // $data['urls'] = Medialurl::where('medialtittle_id',$request_body['medialtittle_id'])->get();
            // $data['media_attribute'] = MedialTittle::where('id',$request_body['medialtittle_id'])->first();
            // return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
            //throw $th;
            //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

     public function destroy($id){
        try {
             Medialurl::destroy($id);
             return redirect('admin/url');
       //return response()->json(['status'=>'success','code'=>200,'data'=>'url deleted']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'opps!! something went wrong']);
             //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }
    }

}
