<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use Validator;
use Auth;
use Hash;
use Session;
use URL;
use Image;
use App\Color;
use App\Events\PasswordResetEvent;
use App\Events\LinkViewEvent;

class UserController extends Controller
{
    public function addImage($folderName, $image, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $image->getClientOriginalName();
        Image::make($image)->resize(150,150)->save($path. $filename);
        //$image->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }

    public function addBanner($folderName, $image, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $image->getClientOriginalName();
        Image::make($image)->resize(150,150)->save($path. $filename);
        //$image->move($path, $filename);
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }

    public function create(){
        if(Auth::user()){
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function signup(){
        if(Auth::user()){
            return redirect()->back();
        }
        return view('auth.register');
    }
   
public function register(Request $request){
    try {
        $rules =['email'=>'required|email','username'=>'required|min:3|max:16','password'=>'required|min:6|max:16'];
    $data = $request->only(['email','username','password']);
    $is_valid = Validator::make($data,$rules);
    if($is_valid->fails()){
        return redirect()->back()->withErrors($is_valid);
    }
    $user = User::where('email',$data['email'])->get();
    if(count($user)>0){
        return redirect()->back()->withErrors(['errors'=>'An account already exist']);
    }
    $color = Color::first();
    $data['color_id']=$color->id;
    $data['password']=Hash::make($data['password']);
    User::create($data);
    return redirect('/login')->with('msg','login with your credentials');

    } catch (\Throwable $th) {
        //throw $th;
        return redirect()->back()->withErrors(['errors'=>'Opps!! something went wrong try again']);
    }

}
   public function login(Request $request){
    $rules =[
        'username'=>'required|min:3|max:16',
        'password'=>'required|min:6|max:16'
    ];
    
    $data = $request->only(['username','password']);
    $is_valid = Validator::make($data,$rules);
    if($is_valid->fails()){
        return redirect()->back()->withErrors($is_valid);
    }
    if(Auth::attempt($data)){
       $token= Auth::user()->createToken('token')->plainTextToken;
        Session::put('token',$token);
        return redirect('/admin');
    }
   
    return redirect()->back()->withErrors(['errors'=>'login failed. Check credentials and try again']);
   }


    public function show(User $user){
        $data['links']= Link::where('user_id',$user->id)->get();
        $data['username']=$user->username;
        $data['text_color'] = $user->color->text_color;
        $data['background_color']= $user->color->background_color;
        $data['picture'] = $user->picture;
        $data['banner']= $user->banner;
        event(new LinkViewEvent($user->id));
        return view('admin.links.index',$data);
    }

    public function account(){
        return view('admin.account.index');
    }


    public function changePassword(Request $request, $id){
        try {
            $rules = ['oldpassword'=>'required','password'=>'required|min:6|max:32'];
        $request_body = $request->only(['oldpassword','password']);
        $isvalid = Validator::make($request_body,$rules);
        if($isvalid->fails()){
            
            return redirect()->back()->withErrors($isValid);
        }

        $data = User::where('id',$id);
        $user = $data->first();
        $current_password = $user->password;
        if(!Hash::check($request_body['oldpassword'], $current_password)){
            return redirect()->back()->withErrors(['errors'=>'wrong password']);
        }
        $res= $data->update(['password'=>Hash::make($request_body['password'])]);
        return $res?redirect('/admin/logout'):redirect()->back()->withErrors(['errors'=>'something went wrong']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'Opps!! something went wrong try again']);
        }
    }

    public function update(Request $request,  $user_id){
        $rules =[
            'username'=>'required|min:3|max:16',
            'email'=>'required|email',  
        ];
        $request_body = $request->only(['username','email']);
        $isValid = Validator::make($request_body,$rules);
        if($isValid->fails()){
            return response()->json(['status'=>'fail','code'=>400,'errors'=>$isValid->messages()]);
        }
        $user = User::where('id',$user_id);
        $user->update($request_body);
        $res =User::where('id',$user_id)->get();
        return $res?response()->json(['status'=>'success','code'=>200,'data'=>$res]):response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
    }

    public function updatePicture(Request $request, $user_id){
        try {
            if(!$request->hasFile('picture')){
                return redirect()->back()->withErrors(['errors'=>'no image selected']);
            }
            $rules =['picture'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048'];
            $data = $request->only(['picture']);
            $is_valid = Validator::make($data, $rules);
            if($is_valid->fails()){
                return redirect()->back()->withErrors($is_valid)->withInp();
            }
            $picture  = $request->file('picture');
            
            $path = $this->addImage('uploads/avatar/',$picture,env('APP_URL'));

            $res = User::where('id',$user_id)->update(['picture'=>$path]);
            return $res?redirect()->back()->with('msg','picture updated'):redirect()->back()->withErrors(['errors'=>'something went wrong']);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'something went wrong. file too large']);
        }
    }

    public function updateBanner(Request $request, $user_id){
        try {
            // if(!$request->hasFile('banner')){
            //     return response()->json(['status'=>'fail','code'=>400, 'error'=>'no image selected']);
            // }
            $rules =['banner'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048'];
            $data = $request->only(['banner']);
            $is_valid = Validator::make($data, $rules);
            if($is_valid->fails()){
                return response()->json(['status'=>'fail','code'=>400, 'error'=>$is_valid->messages()]);
            }
            $picture  = $request->file('banner');
            
            $path = $this->addBanner('uploads/banner/',$picture,env('APP_URL'));

            $res = User::where('id',$user_id)->update(['banner'=>$path]);
            $banner = User::where('id',$user_id)->pluck('banner');
            return $res?response()->json(['status'=>'success','code'=>200,'data'=>$banner[0]]):response()->json(['status'=>'fail','code'=>400, 'error'=>'an error occurred. try again']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400, 'error'=>'an error occurred. try again']);
        }
    }
    public function deleteAccount($user_id){ 
        User::destroy($user_id);
        return redirect('/');
    }
    public function signout(){
        Auth::logout();
        return redirect('/login');
    }


    public function resetForm(){
        return view('auth.reset');
    }
    
    public function resetMail(Request $request){
        try {
            $rules =['email'=>'required|email'];
        $data = $request->only(['email']);
        $is_valid = Validator::make($data,$rules);
        if($is_valid->fails()){
            return response()->json(['status'=>'fail','code'=>400, 'error'=>$is_valid->messages()]);
            
        }
        $user = User::where('email',$data['email'])->get();
        if(count($user)<=0){
            return response()->json(['status'=>'fail','code'=>400, 'error'=>'Wrong credentials. check and try again']);
        }
        $details =[
            'link'=>URL::temporarySignedRoute('resetlink',now()->addMinutes(5))
        ];
        $email =$data['email'];
        event(new PasswordResetEvent($details,$email));
        return response()->json(['status'=>'success','code'=>200,'data'=>'a reset link has been sent to your mail']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'link not sent, something went wrong']);
        }
    }

    public function resetLink(Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        return view('auth.newpassword');
    }

    public function resetPassword(Request $request){
        try {
            $rules =['email'=>'required|email','password'=>'required|min:6|max:32'];
        $data =$request->only(['email','password']);
        $isvalid = Validator::make($data,$rules);
        if($isvalid->fails()){
            
            return redirect()->back()->withErrors($isvalid->messages());
        }
        $user = User::where('email',$data['email']);
        if(count($user->get())<=0){
            return redirect()->back()->withErrors(['errors'=>'Wrong email. Something smells fishy']);
        }
        $password =$data['password'];
        $user->update(['password'=>Hash::make($password)]);
        return redirect('/login')->with('msg','password updated, Login with your new credentials');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors'=>'Opps!! something went wrong try again']);
        }
    }
    public function setting(){
        return view('admin.account.setting');
    }
}
