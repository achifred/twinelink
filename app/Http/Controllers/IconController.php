<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icon;
use Validator;
use Image;
use App\Icontype;
class IconController extends Controller
{
    public function addImage($folderName, $image, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $image->getClientOriginalName();
        Image::make($image)->save($path. $filename);
        //$image->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }

    public function index(){
        $data['icons'] = Icon::paginate(10);
        return view('admin.icons.index', $data);
    }
    public function socialIcons(){
        try {
            $data = Icon::where('icontype_id',1)->get();
            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
            //throw $th;
        }
    }

    public function mediaIcons(){
        try {
            $data = Icon::where('icontype_id',2)->get();
            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
            //throw $th;
        }
    }

    public function create(){
        $data['icontypes'] = Icontype::all();
        return view('admin.icons.create',$data);
    }

    public function edit(Request $request, $icon){
        $data['icontypes'] = Icontype::all();
        $data['icon'] = Icon::where('id',$icon)->first();
        return view('admin.icons.edit',$data);
    }

    public function store(Request $request){
        try {
            if(!$request->hasFile('icon_path')){
                return redirect()->back()->withErrors(['errors'=>'no image selected']);
            }
            $rules=['icon_path'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048','icon_name'=>'required','icontype_id'=>'required'];
            $data = $request->only(['icon_path','icon_name','icontype_id']);
            $is_valid = Validator::make($data,$rules);
            if($is_valid->fails()){
                return redirect()->back()->withErrors($is_valid)->withInput();
            }
            $icon  = $request->file('icon_path');
            
            $path = $this->addImage('uploads/icons/',$icon,env('APP_URL'));
            $data['icon_path'] = $path;
            Icon::create($data);
            return redirect()->back()->with('msg','icon added. Add another one');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $icon){
            try {
                $rules=['icon_path'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048','icon_name'=>'required','icontype_id'=>'required'];
            $data = $request->only(['icon_path','icon_name','icontype_id']);
            $is_valid = Validator::make($data,$rules);
            if($is_valid->fails()){
                return redirect()->back()->withErrors($is_valid)->withInput();
            }
            if($request->hasFile('icon_path')){
                $icon  = $request->file('icon_path');
            
                $path = $this->addImage('uploads/icons/',$icon,env('APP_URL'));
                $data['icon_path'] = $path;
            }
            Icon::where('id',$icon)->update($data);
            return redirect()->back()->with('msg','icon updated.');
            } catch (\Throwable $th) {
                throw $th;
            }
    }
}
