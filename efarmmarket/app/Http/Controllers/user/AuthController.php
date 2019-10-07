<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 2:48 PM
 */

namespace EfarmMarket\Http\Controllers\user;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Http\Controllers\GeneralController;
use EfarmMarket\Models\ActivityLog;
use EfarmMarket\Models\User;
use EfarmMarket\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    public function UserReg(){
        return view('users.userReg')->with('title', 'user | registration');
    }
    public function postUserReg(Request $request){
        $this->validate($request,[
           'firstname'=>'required|present|max:20|min:2',
            'lastname'=>'required|present|max:20|min:2',
            'email'=>'required|present|max:25|email|unique:users,email',
            'username'=>'required|present|max:20|min:2|unique:users,username',
            'phone'=>['required','present','numeric','unique:users,phone',
                function($attribute, $value, $fail)
            {
                if (strlen($value) < 11) {
                    $fail("The number can not be less than 11 digits");
                } elseif (strlen($value) > 11) {
                    $fail("The number can not be greater than 11 digits");
                }
            }
            ],
            'password'=>'required|present|min:6|numeric|confirmed',
            'password_confirmation'=>'required|present|max:50|min:6|same:password',
            'ownership'=>'required|present|boolean',
            ]);

        if($request->input('ownership')==0){
            $verified = 1;
        }else{
            $verified = null;
        }
        if(User::create([
            'username'=>$request->input('username'),
            'firstName'=>$request->input('firstname'),
            'lastName'=>$request->input('lastname'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'customerType'=>$request->input('ownership'),
            'verified'=>$verified,
            'password'=>bcrypt($request->input('password')),

        ])){
            $user = User::where('username',$request->input('username'))->first();
            Wallet::create([
               'user_id'=>$user->id,
               'amount'=>0,
            ]);
            return redirect()->route('homepage')->with('success',GeneralController::error_success('Successful',"User Created Succesfully, You Can Now login"));
        }else{
            return redirect()->route('homepage')->with('failure',GeneralController::error_success('Whoops',"Something Went Wrong"));
        }
    }
    public  function postLogin(Request $request){
        $this->validate($request,[
           'username'=>'required|present|min:2|max:20',
           'password'=>'required|present|min:6|max:20',
        ]);
        if(Auth::guard('web')->attempt([
            'username'=>$request->input('username'),
            'password'=>$request->input('password')])){
            ActivityLog::create([
                'user_id'=>\auth('web')->user()->id,
                'action'=>"Logged in",
            ]);
             return redirect()->back();
        }else{
            return redirect()->back()->with('failure',GeneralController::error_success('Invalid Login Details',"The Details Provided Does not match any Records"));
        }
    }

}