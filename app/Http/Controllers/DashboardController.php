<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{
    public function index(){
        $data['total_users']= User::all()->count();
        $data['today_register_users'] = User::whereDate('created_at',Carbon::today())->count();
        $data['total_links_created'] = Link::all()->count();
        $data['total_links_created_today'] = Link::whereDate('created_at',Carbon::today())->count();
        return view('dashboard.index',$data);
    }

    public function allUsers(){
        $users= DB::select('SELECT user_id, COUNT(id) AS total_links FROM links GROUP BY user_id');
        
        $users = collect($users);
        $users->transform(function($item,$key){
            $res = User::where('id',$item->user_id)->first();
            $item->username =$res->username;
            $item->email=$res->email;
            return $item;
        });
        
        $data['userlinks'] = $users;

        $data['users']=User::paginate(10);

        return view('dashboard.users', $data);

    }

    

    
}
