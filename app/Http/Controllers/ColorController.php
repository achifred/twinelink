<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\User;
use Validator;

class ColorController extends Controller
{
    public function index(){
        $data = Color::all();
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
    }

    public function themes(){
        $data['themes']= Color::paginate(10);
        return view('dashboard.themes.themes', $data);
    }
    public function create(){
        return view('dashboard.themes.create');
    }

    public function edit($id){
        $data['color']= Color::where('id',$id)->first();
        return view('dashboard.themes.edit',$data);
    }


    public function store(Request $request){
        $rules =[
            'background_color'=>'required',
            'text_color'=>'required'
        ];
        $data = $request->only(['background_color','text_color']);
        $is_valid = Validator::make($data,$rules);
        if($is_valid->fails()){
            return redirect()->back()->withErrors($is_valid);
        }
        Color::create($data);
        return redirect()->back()->with('msg','theme added');
    }

    public function update(Request $request,$id){
        $rules =[
            'background_color'=>'required',
            'text_color'=>'required'
        ];
        $data = $request->only(['background_color','text_color']);
        $is_valid = Validator::make($data,$rules);
        if($is_valid->fails()){
            return redirect()->back()->withErrors($is_valid);
        }

        Color::where('id',$id)->update($data);
        return redirect()->back()->with('msg','theme updated');
    }

    public function changeTheme($id,$user_id){
       try {
        $user = User::where('id',$user_id);
        $user->update(['color_id'=>$id]);
        $data = Color::where('id',$id)->first();
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
       } catch (\Throwable $th) {
           //throw $th;
       }
  }
}
