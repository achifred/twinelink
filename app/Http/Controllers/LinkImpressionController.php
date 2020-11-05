<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LinkImpression;
use Carbon\Carbon;
class LinkImpressionController extends Controller
{
    public function stats(){
        return view('admin.stats.index');
    }
    public function pageStats($user_id){
        try {
            $data['page_impression'] = DB::select('SELECT MONTHNAME(link_impressions.created_at)AS month, SUM(link_impressions.impression_count) AS impression_count FROM link_impressions JOIN users ON link_impressions.user_id = users.id WHERE YEAR(link_impressions.created_at)=YEAR(CURDATE())AND link_impressions.user_id=? GROUP BY MONTHNAME(link_impressions.created_at) ORDER BY MONTHNAME(link_impressions.created_at) DESC
            ',[$user_id]);
            $data['views_per_link'] =DB::select('SELECT links.name, COUNT(visits.id) AS visit_count FROM links JOIN visits ON links.id = visits.link_id WHERE links.user_id=? GROUP BY  links.name',[$user_id]);
            $data['views_per_link_today'] =DB::select('SELECT links.name, COUNT(visits.id) AS visit_count FROM links JOIN visits ON links.id = visits.link_id WHERE links.user_id=? AND CAST( visits.created_at AS Date )=? GROUP BY  links.name',[$user_id, Carbon::today()]);
            $data['total_page_impression'] = LinkImpression::where('user_id',$user_id)->sum('impression_count');
            $data['today_page_impression'] = LinkImpression::where('user_id',$user_id)->whereDate('created_at',Carbon::today())->sum('impression_count');
        return response()->json(['status'=>'success','code'=>200,'data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'fail','code'=>400,'error'=>'something went wrong']);
            //throw $th;
        }
    }
}
