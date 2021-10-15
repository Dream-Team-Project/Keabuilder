<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        return view('home');
    }

    public function builder()
    {
        return view('builder');
    }

    // public function adminLogin(Request $request){
    //     //validate request
    //     $this->validate($request,[
    //         'email'=>  'required',
    //         'password'=> 'bail|required|min:6'
    //     ]);

    //     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    //         return response()->json([
    //             'msg'=> 'You are Logged in'
    //         ]);
    //     }else{
    //         return response()->json([
    //             'msg'=> 'Incorrect login details'
    //         ]);
    //     }
    // }
  
}
