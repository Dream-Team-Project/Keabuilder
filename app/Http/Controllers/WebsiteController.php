<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\Auth;
use App\Webpages;
use App\Automations;
use App\Campaigns;
use App\Website;

class WebsiteController extends Controller
{

  public function getpages(Request $request){

    $data = Webpages::get();
    return $data;

  }

  public function getautomation(Request $request){

    $data = Automations::get();
    return $data;

  }

  public function getcampaign(Request $request){

    $data = Campaigns::get();
    return $data;

  }

  public function getwebsite(Request $request){

    $data = Website::where('id', '1')->get();
    return $data;

  }
  
}
