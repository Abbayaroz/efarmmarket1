<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 6:56 AM
 */

namespace EfarmMarket\Http\Controllers\Admin;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Http\Controllers\GeneralController;
use EfarmMarket\Models\Admin;
use EfarmMarket\Models\AdminLog;
use EfarmMarket\Models\ContactUs;
use EfarmMarket\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller

{
        public function __construct()
        {
            $this->middleware("guest")->except(['getAdminLogout','verify','read']);
        }

    public function getAdminLogin(){
        if(!auth()->guard('web')->check())
        return view ('admin.adminLogin')->with('title', 'Admin | Login');
        else{
            return redirect()->route('landingPage')->with('success',GeneralController::error_success('oops!!','something went wrong'));
        }
    }
    public function postAdminLogin(Request $request){

        $this->validate($request,[
            'username'=>'required|present|min:2',
            'password'=>'required|present|min:6',
        ]);
        if(Auth::guard('admin')->attempt([
            'username'=>$request->input('username'),
            'password'=>$request->input('password')
        ]))
        {
            AdminLog::create([
                'user_id'=>\auth('admin')->user()->id,
                'action'=>"logged in",]);
            if (\auth()->guard('admin')->user()->previlage == 1) {
                return redirect()->route('admin.statistics');
            }else{
                return redirect()->route('users.page');
            }
        }else{
            return redirect()->back()->with('failure',GeneralController::error_success('Incorrect',"The Details Provided Don't match any Records"));
        }
    }
    public function getAdminLogout(){
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"logged out",]);
            auth()->guard('admin')->LogOut();
            return redirect()->route('admin.login');
    }
    public function verify(User $userId){
          $this->middleware('auth:admin');
          $userId->update(['verified'=>1]);
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"verified a new user"]);
            return redirect()->back()->with('success',GeneralController::error_success('done','verified'));
    }
    public function read(ContactUs $read){
        $this->middleware('auth:admin');
        $read->update(['attended_status'=>1]);
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"view customers feedback",]);
        return redirect()->back()->with('success',GeneralController::error_success('Attended','Successfully Attended to'));
    }
}