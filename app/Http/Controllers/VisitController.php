<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visit;
use DB;
use Carbon\Carbon;

class VisitController extends Controller
{
    public function stats($link_id){
        return view('admin.links.stats',['link_id'=>$link_id]);
    }
    public function store(Request $request, $link_id){
        $data['user_agent']=$request->userAgent();
        $data['link_id']= $link_id;
        Visit::create($data);
       return response()->json(['status'=>'success','code'=>200,'data'=>'visit added']);

    }

     // LINKS STATS
     public function linkStatistics($link, $user_id){
        try {
            $data['clicks'] = DB::select('SELECT MONTHNAME(visits.created_at)AS month, count(visits.id) AS link_click_count FROM visits JOIN links ON links.id = visits.link_id WHERE YEAR(visits.created_at)=YEAR(CURDATE())AND links.user_id=? AND visits.link_id=? GROUP BY MONTHNAME(visits.created_at) ORDER BY MONTHNAME(visits.created_at) DESC
            ',[$user_id, $link]);
            $data['total_clicks'] = DB::table('visits')->join('links','links.id','=','visits.link_id')
                ->where('links.user_id',$user_id)->where('visits.link_id',$link)->count();

            $data['clicks_today'] = DB::table('visits')->join('links','links.id','=','visits.link_id')
            ->where('links.user_id',$user_id)->where('visits.link_id',$link)->whereDate('visits.created_at',Carbon::today())->count();

             return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
            //throw $th;
        }
    } 

    
}
