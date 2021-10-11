<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HeatmapController extends Controller
{
    public function store(Request $request)
    {
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

}
