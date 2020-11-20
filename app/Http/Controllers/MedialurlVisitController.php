<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedialurlVisit;
use DB;
use Carbon\Carbon;
class MedialurlVisitController extends Controller
{
    public function stats($url_id){
        return view('admin.stats.urlstats',['url_id'=>$url_id]);
    }
    public function store(Request $request, $url_id){
        try {
            $data['user_agent']=$request->userAgent();
        $data['medialurl_id']= $url_id;
        MedialurlVisit::create($data);
       return response()->json(['status'=>'success','code'=>200,'data'=>'visit added']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
        }

    }

    public function urlStats($url_id, $user_id){
       try {
        $data['clicks_per_Month'] = DB::select('SELECT MONTHNAME(medialurl_visits.created_at)AS month, count(medialurl_visits.id) AS url_click_count FROM medialurl_visits JOIN medialurls ON medialurls.id = medialurl_visits.medialurl_id WHERE YEAR(medialurl_visits.created_at)=YEAR(CURDATE())AND medialurls.user_id=? AND medialurl_visits.medialurl_id=? GROUP BY MONTHNAME(medialurl_visits.created_at) ORDER BY MONTHNAME(medialurl_visits.created_at) DESC
        ',[$user_id, $url_id]);

            $data['total_clicks'] = DB::table('medialurl_visits')->join('medialurls','medialurls.id','=','medialurl_visits.medialurl_id')
            ->where('medialurls.user_id',$user_id)->where('medialurl_visits.medialurl_id',$url_id)->count();

            $data['clicks_today'] = DB::table('medialurl_visits')->join('medialurls','medialurls.id','=','medialurl_visits.medialurl_id')
            ->where('medialurls.user_id',$user_id)->where('medialurl_visits.medialurl_id',$url_id)->whereDate('medialurl_visits.created_at',Carbon::today())->count();
            return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
       } catch (\Throwable $th) {
           //throw $th;
           return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
       }
    }
}
