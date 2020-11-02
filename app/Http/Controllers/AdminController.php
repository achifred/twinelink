<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Hash;
use Auth;
class AdminController extends Controller
{
    public function create(){
        return view('auth.adminlogin');
    }

    public function show($id){
        $data['admin'] = Admin::where('id',$id)->first();
        return view('auth.show', $data);
    }

    public function editpassword(){
        return view('admin.password');
    }

   

    public function signup(){
        return view('admin.signup');
    }
     // adds new admin to storage
     public function register(Request $request){
        try {
            $rules =[
                
                
                'email'=>'required|email',
                
                'password'=>'required|min:6|max:15'
            ];
            $request_body = $request->only(['email','password']);
            $isValid = Validator::make($request_body,$rules);
            if($isValid->fails()){
                return redirect()->back()->withErrors($isValid)->withInput();
            }
    
            $request_body['password'] = Hash::make($request_body['passsword']);
            $user = Admin::create($request_body);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
        
    }

    public function update(Request $request, $id){
        $rules=['email'=>'required|email'];
        $request_body = $request->only(['email']);
        $isValid = Validator::make($request_body,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid)->withInput();
        }
        $admin = Admin::where('id',$id);
        $admin->update($request_body);
        return redirect()->back();
    }

    // authenticate an admin
    public function login(Request $request){
       
        $rules =['email'=>'required|email','password'=>'required|min:6"max:15'];
        $request_body = $request->only(['email','password']);
        $isValid = Validator::make($request_body,$rules);
        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid)->withInput();
        }
        //TODO fix permission errors
        if(Auth::guard('admin')->attempt($request_body)){
            return redirect('/dashboard')->with('msg','Welcome back');
            
        }
        return redirect()->back()->withErrors(['errors'=>'login failed. Check credentials and try again']);
        
    
    }

    public function signout(Request $request){
       Auth::guard('admin')->logout();
       return redirect('/me');

    }


    public function changePassword(Request $request, $id){
        $rules = ['oldpassword'=>'required','password'=>'required|min:6|max:32'];
        $request_body = $request->only(['oldpassword','password']);
        $isvalid = Validator::make($request_body,$rules);
        if($isvalid->fails()){
            
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        $data = Admin::where('id',$id);
        $admin = $data->first();
        $current_password = $admin->password;
        if(!Hash::check($request_body['oldpassword'], $current_password)){
            return redirect()->back()->withErrors(['errors'=>'wrong password']);
        }
        $data->update(['password'=>Hash::make($request_body['password'])]);
        Auth::guard('admin')->logout();
       return redirect('/me');
    }
}
