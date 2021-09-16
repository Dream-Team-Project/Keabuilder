<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMailable;
use App\PasswordReset;
use App\User;
use Illuminate\Support\Str;


class AppController extends Controller
{
    public function init(){
        $user = Auth::user();
        return response()->json(['user'=>$user],200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=> $request->email, 'password'=>$request->password],true)){
            return response()->json(Auth::user(),200);
        }else{
            return response()->json(['error'=>'Could not log you in.'],401);
        }

    }

    public function register(Request $request){
        $user = User::where('email', $request->username)->first();

        if(isset($user->id)){
            return response()->json(['error'=>'Email already exists'],401);
        }
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);

        return response()->json($user, 200);

    }

    public function logout(){
        Auth::logout();
    }   

    public function sendToken(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!isset($user->id)){
            return response()->json(['error'=>'User with this email does not exist'],401); 
        }

        // $token = str_random(32);
        $token = Str::random(32);

        Mail::to($user)->send(new ResetPasswordMailable($token));

        $passwordReset = new PasswordReset();
        $passwordReset->email = $user->email;
        $passwordReset->token = $token;
        $passwordReset->save();

    }

    public function validateToken(Request $request){
        $passwordReset = PasswordReset::where('token',$request->token)->first();

        if(!isset($passwordReset->email)){
            return response()->json(['error'=>'Invalid token.'], 401);
        }

        $user = User::where('email', $passwordReset->email)->first();
        return response()->json($user,200);

    }

    public function resetPassword(Request $request){
        $user=User::find($request->user_id);
        $passwordReset = PasswordReset::where('email',$user->email)->first();
        $passwordReset->delete();

        $user->password = bcrypt($request->password);
        $user->save();
    }

}
