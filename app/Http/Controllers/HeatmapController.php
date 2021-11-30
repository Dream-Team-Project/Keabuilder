<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class HeatmapController extends Controller
{
    public function store(Request $request){
        // $dataall = $request->all();
        $uniqueid = $request->name['uniqueid'];
        $created_at = $request->name['created_at'];
        $browser = $request->name['browser'];
        $os = $request->name['os'];
        $device = $request->name['device'];
        $kb_landing_page = $request->name['landing_page'];
        $kb_location = $request->name['location'];
        $kb_doctitle = $request->name['doctitle'];
        
        if(isset($request->name['locx'])){
            $locx = $request->name['locx'];
            $locx = implode(",",$locx);
            $locY = $request->name['locY'];
            $locY = implode(",",$locY);

            if(isset($request->name['Mlocx'])){
                $Mlocx = $request->name['Mlocx'];
                $Mlocx = implode(",",$Mlocx);
                $MlocY = $request->name['MlocY'];
                $MlocY = implode(",",$MlocY);
            }else{
                $Mlocx = '';
                $MlocY = '';
            }
        }else{

            $locx = '';
            $locY = '';

            $Mlocx = $request->name['Mlocx'];
            $Mlocx = implode(",",$Mlocx);
            $MlocY = $request->name['MlocY'];
            $MlocY = implode(",",$MlocY);

        }   

        $data = array(
            "uniqueid"=>$uniqueid,
            "ipaddress"=>"",
            "created_at"=>$created_at,
            "time_taken"=>"",
            "landing_page"=>$kb_landing_page,
            "exit_page"=>"",
            "source"=>"",
            "location"=>$kb_location,
            "browser"=>$browser,
            "os"=>$os,
            "device"=>$device,
            "locx"=>$locx,
            "locY"=>$locY,
            "doc_title"=>$kb_doctitle,
            "mouseX"=>$Mlocx,
            "mouseY"=>$MlocY
        );

        $checkunique = DB::select('select * from heatmaps WHERE uniqueid = "'.$uniqueid.'"');

        if(empty($checkunique)){
            DB::table('heatmaps')->insert($data);
        }else{
            $id = $checkunique[0]->id;
            DB::table('heatmaps')->where('id', $id)->update($data);
        }

        return response()->json([  
            'success'=>'Ajax request submitted successfully',
            "data"=>$data,
        ]);
    }

    public function get(Request $request){

        $data = DB::table('heatmaps')->select('landing_page')->distinct()->get();
        return $data;

    }

    public function fetchloc(Request $request){

        $url = $request->url;
        $data = DB::table('heatmaps')->select('locx','locY')->where('landing_page', $url)->get();
        return $data;

    }

    public function fetchmou(Request $request){

        $url = $request->url;
        $data = DB::table('heatmaps')->select('mouseX','mouseY')->where('landing_page', $url)->get();
        return $data;

    }

    public function fetchall(Request $request){
        $url = $request->url;
        $data = DB::table('heatmaps')->where('landing_page', $url)->orderBy('created_at', 'desc')->get();
        return $data;
    }
    
    public function fetchshowme(Request $request){
        $url = $request->url;
        $browser_segment = $request->browser_segment;
        $whichvalue = $request->whichvalue;
        if(isset($browser_segment)){
            if($whichvalue=='created_at'){
                $data = DB::table('heatmaps')->where('landing_page', $url)->whereDate($whichvalue,'<=',$browser_segment)->get();
            }else if($whichvalue=='daterange_segment'){
                $data = DB::table('heatmaps')->where('landing_page', $url)->whereBetween('created_at',$browser_segment)->get();
            }else{
                $data = DB::table('heatmaps')->where('landing_page', $url)->whereIn($whichvalue,$browser_segment)->get();
            }
        }else{
            $data = [];
        }
        return $data;
    }

    public function saverecordheat(Request $request){
        $date = $request->date;
        $uniqueid = $request->uniqueid;

        $checkunique = DB::select('select * from heatmaps WHERE uniqueid = "'.$uniqueid.'"');
        $data = array(
            "uniqueid"=>$uniqueid
        );
        if(!empty($checkunique)){
            $id = $checkunique[0]->id;
            DB::table('heatmaps')->where('id', $id)->update($data);
        }else{
            DB::table('heatmaps')->insert($data);
            // $name = $name.','.$checkunique[0]->name;
            // $data = array(
            //     "name"=>$name,
            //     "url"=>$url,
            //     "uniqueid"=>$uniqueid
            // );
            // $id = $checkunique[0]->id;
            // DB::table('heatrecords')->where('id', $id)->update($data);
        }

    }

    public function showrecordheat(Request $request){

        $url = $request->url;
        $data = DB::select('select * from heatmaps WHERE landing_page = "'.$url.'"');
        return $data;
    }

    public function getheatdir(Request $request){
        $path = 'videos_heatmaps/';
        if (is_dir($path)) {
            $res = array();
            foreach (array_filter(glob($path ."*"), 'is_file') as $file) {

                $ab = str_replace($path,"",$file);
                $ac = str_replace(".webm", "",$ab);

                if (strpos($ac, $request->hash) !== false) {
                    array_push($res, str_replace($path, "", $file));                
                }
                
            }
            return $res;
        }
    }

    public function visitorinfo(Request $request){
        $uniqueid = $request->hash;

        $checkunique = DB::select('select * from heatmaps WHERE uniqueid = "'.$uniqueid.'"');

        return $checkunique;
    }

}
