<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/27/2018
 * Time: 7:06 AM
 */

namespace EfarmMarket\Http\Controllers\user;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Models\ActivityLog;
use Illuminate\Http\Request;


class AuthUser extends Controller
{
    public  function __construct()
    {
        $this->middleware("auth:web");
    }
    public function buyerPage(Request $request){
        if($request->query('type')==null) {
            return view('users.userGallery')->with('title', 'Gallery');
        }elseif ($request->query('type')=="js"){
            return view('users.partials.userGallery');
        }

    }
    public function LogOut()
    {
        ActivityLog::create([
            'user_id'=>\auth('web')->user()->id,
            'action'=>"logged out",
        ]);
        auth()->guard('web')->LogOut();
        return redirect()->route('homepage');
    }
    public function userProfileUpdate(Request $request){
        if($request->query('type')==null) {
            return view('users.profileUpdate')->with('title', 'Update | Profile');
        }elseif ($request->query('type')=="js"){
            return view('users.partials.profileUpdate');
        }
    }
    public function userMessages(Request $request){
        if($request->query('type')==null) {
        return view('users.usersMessages')->with('title', 'view | messages');
        }elseif ($request->query('type')=="js"){
            return view('users.partials.usermessages');
        }
    }
    public function userWallet(Request $request){
        if($request->query('type')==null) {
        return view('users.userWallet')->with('title', 'my | wallet');
        }elseif ($request->query('type')=="js"){
            return view('users.partials.userWallet');
        }
    }
}
