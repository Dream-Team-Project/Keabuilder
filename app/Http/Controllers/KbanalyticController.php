<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class KbanalyticController extends Controller
{

    public function usersbycountry(Request $request){
     
        $data = DB::select('select location from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function usersdoctitle(Request $request){
     
        $data = DB::select('select doc_title from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function usersbycity(Request $request){
     
        $data = DB::select('select city from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function latitudelongtitude(Request $request){
     
        $data = DB::select('select latitude,longitude from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function userbrowser(Request $request){
     
        $data = DB::select('select browser from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function useros(Request $request){
     
        $data = DB::select('select os from heatmaps ORDER BY created_at DESC');

        return $data;
    }

    public function userdevice(Request $request){
     
        $data = DB::select('select device from heatmaps ORDER BY created_at DESC');

        return $data;
    }

}