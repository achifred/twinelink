<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;
use Validator;
use App\LinkImpression;
use App\Icon;
use Image;

class LinkController extends Controller
{
    public function addImage($folderName, $image, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $image->getClientOriginalName();
        Image::make($image)->resize(320,320)->save($path. $filename);
        //$image->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }

    public function index(){
        $data['links'] = Auth::user()->links()
        ->withCount('visits')
        ->with('latest_visit')
        ->get();
        $data['icons'] = Icon::where('icontype_id',1)->get();
        
        return view('admin.index',$data);
    }
    public function create(){
        return view('links.create');
    }
    public function store(Request $request){
       try {
        $rules =['name'=>'required','link'=>'required|url','user_id'=>'required'];
        $data = $request->only(['name','link','user_id','icon_id']);
        $isValid = Validator::make($data,$rules);
        //return $isValid->errors();
        if($isValid->fails()){
            return response()->json(['status'=>'fail','code'=>400,'error'=>$isValid->errors()]);
        }

        //return $data['icon_id'];
    
        $res= Link::create($data);
        $link = Link::where('id',$res->id)->get();
        $link->transform(function($item, $key){
            $icon = Icon::where('id',$item->icon_id)->get();
            if(count($icon)>0){
                $item->icon = $icon[0]->icon_path;
            }
            return $item;
        });
       return $link?response()->json(['status'=>'success','code'=>200,'data'=>$link[0]]):response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
       } catch (\Throwable $th) {
        //return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
           throw $th;
       }

    }

    public function edit($link){
       $data = Link::where('id',$link)->get();
       $data->transform(function($item, $key){
        $icon = Icon::where('id',$item->icon_id)->get();
        if(count($icon)>0){
            $item->icon = $icon[0]->icon_path;
        }
        
        return $item;
    });
       return response()->json(['status'=>'success','code'=>200,'data'=>$data[0]]);

    }

    public function update(Request $request,$link){
       
        try {
            $rules =['name'=>'required','link'=>'required|url'];
        $data = $request->only(['name','link','icon_id']);
        $isValid = Validator::make($data,$rules);
        if($isValid->fails()){
            return response()->json(['status'=>'fail','code'=>400,'error'=>$isValid->messages()]);
        }
       $res = Link::where('id',$link)->update($data);
       $resp =Link::where('id',$link)->get();
       $resp->transform(function($item, $key){
        $icon = Icon::where('id',$item->icon_id)->get();
        if(count($icon)>0){
            $item->icon = $icon[0]->icon_path;
        }
    
        return $item;
        });
        return $res?response()->json(['status'=>'success','code'=>200,'data'=>$resp]):response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
            //throw $th;
        }

    }
    public function userLinks($user_id){
        $link = Link::where('user_id',$user_id)->withCount('visits')->get();
        $link->transform(function($item, $key){
            $icon = Icon::where('id',$item->icon_id)->get();
            if(count($icon)>0){
                $item->icon = $icon[0]->icon_path;
            }
            return $item;
        });
        $data['user_links'] = $link;
        $data['link_impression'] = LinkImpression::where('user_id',$user_id)->sum('impression_count');
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
    }
    public function destroy($link){
       Link::destroy($link);
       return response()->json(['status'=>'success','code'=>200,'data'=>'link deleted']);
        
    }


   
}
