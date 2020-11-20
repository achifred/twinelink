<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Enquery;

use App\Events\EnqueryEvent;
class EnqueryController extends Controller
{
    public function Enqueries(Request $request){
        try {
            $rules=[
                'email'=>'required|email',
                'full_name'=>'required|min:3',
                
                'subject'=>'required',
                'message'=>'required'
    
            ];
    
            $data = $request->only(['email','full_name','subject','message']);
            $isvalid = Validator::make($data,$rules);
            if($isvalid->fails()){
                
                return redirect()->back()->withErrors($isvalid->messages());
            }
            $details =[
                'title'=>$data['subject'],
                'msg'=>$data['message'],
                'name'=>$data['full_name'],
                
            ];
            $email = $data['email'];
            $subject = $data['subject'];
            Enquery::create($data);
        
            event(new EnqueryEvent($details, $email, $subject) );
            return redirect()->back()->with('msg','Thanks for contacting us.we will get back to you soon');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(['errors'=>'mesage not sent. something went wrong']);
        }

    }

    public function allEnqueries(){
        $data['enqueries'] = Enquery::all();
        return view('admin.enquery', $data);
    }
}
