<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/2/2018
 * Time: 6:03 AM
 */

namespace EfarmMarket\Http\Controllers\owner;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Http\Controllers\GeneralController;
use EfarmMarket\Models\ActivityLog;
use EfarmMarket\Models\Charge;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\User;
use Illuminate\Http\Request;


class AuthController2 extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }
    private $property;
    public function uploadProperty(Request $request,Charge $charge)
    {
        $this->validate($request, [
            'propertyPicture.*'=>'required|present|mimes:jpeg,png,jpeg,gif|max:9048',
            'description'=>'min:6|present|required',
            'price'=>'required|present|numeric|min:100|',
            'name'=>'required|present|min:2|',
            'quantity'=>'required|present|',


        ]);
        $fileArray = [];
    //dd($request->file('propertyPicture.*'));
        foreach ($request->file('propertyPicture.*')as $propertyPicture){
            $fileArray[]=GeneralController::UploadFile($propertyPicture,['jpg','jpeg','png','gif'],'GalleryPictures');
        }
        $transactionId = "O-".rand(1000,9999)."-".rand(1000,9999);
        //dd($charge->getCharges()->first()->amount);
        if(auth()->guard('web')->user()->myProperties()->create([
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'name'=>$request->input('name'),
            'qty'=>$request->input('quantity'),
            'amount'=>$charge->ownerCharge()->first()->amount,
            'paymentStatus'=>null,
            'transactionId'=>$transactionId,
            'bought'=>0,
        ])){
            $galleryObj = gallery::where('transactionId','=',$transactionId)->first();
            foreach ($fileArray as $value){
               $galleryObj->propertyImages()->create([
                  'pictures'=>$value,
               ]);
            }
            ActivityLog::create([
                'user_id'=>\auth('web')->user()->id,
                'action'=>"Uploaded a property for Advert",
            ]);
            return redirect()
                ->route('general.receipt',['transactionId'=>$transactionId,]);
        }else{
            return redirect()
                ->back()
                ->with("failure",GeneralController::error_success("failure","unsuccessful,do try again"));
        }
    }
    public function ownerUpdateProfile(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|present|max:20|min:2',
            'previousPassword' => ['required','present',function($attribute,$value,$fail){
                if(!password_verify($value,auth()->guard('web')->user()->password)){
                    $fail("The $attribute Does Not Match");
                }
            }],
            'phone'=>['nullable','present','numeric','unique:users,phone','unique:add_admin,phone',
                function($attribute, $value, $fail)
                {
                    if (strlen($value) < 11) {
                        $fail("The number can not be less than 11 digits");
                    } elseif (strlen($value) > 11) {
                        $fail("The number can not be greater than 11 digits");
                    }
                }
            ],
            'password' => 'nullable|present|max:50|min:6|confirmed',
            'password_confirmation'=> 'nullable|present|same:password',
            'email' => 'required|present|max:70|email',
        ]);
        if($request->input('phone')==null){
            $phoneNumber = auth()->guard('web')->user()->phone;
        }else {
            $phoneNumber = $request->input('phone');
        }
        if(is_null($request->input('password'))){
            $password = auth()->guard('web')->user()->password;
        }else{
            $password=bcrypt($request->input('password'));
        }
        auth()->guard('web')->user()->update([
            'phone'=>$phoneNumber,
            'password'=>$password,
        ]);
        ActivityLog::create([
            $male="Updated there Profile",
            'user_id'=>\auth('web')->user()->id,
             'action'=>" Updated his/her Profile",

        ]);
            return redirect()->route('owners.profileUpdate')->with('success',GeneralController::error_success('Successful',"User Profile Succesfully Updated"));
    }
    public function getMarkBought($propertyId){
        $markProperty = gallery::where('id', $propertyId)->first();
        if($markProperty->user_id!==auth()->guard('web')->user()->id){
            return redirect()->route('homepage')->with('failure',
                GeneralController::error_success('Whoops','Thats Not Your Property'));
        }
        return view('owners.markBought')
            ->with('title', 'verify |bought')
            ->with('Property', $markProperty);
    }
    public function postMarkBought(Request $request, $propertyId){
        $this->property = $propertyId;
        $markProperty = gallery::where('id', $propertyId)->first();
        if($markProperty->user_id!==auth()->guard('web')->user()->id){
            ActivityLog::create([
                'user_id'=>\auth('web')->user()->id,
                'action'=>" Attempted Accessing UnAuthorised Property",]);
            return redirect()->route('homepage')->with('failure',
                GeneralController::error_success('Whoops','Thats Not Your Property'));
        }
        $this->validate($request,[
            'user'=>['required','present','exists:users,id',function($attribute,$value,$fail){
                $user = User::find($value);
                if(!$user->IboughtProperty($this->property)){
                    $fail("User Did Not Buy This Property");
                }
            }],

        ]);
        ActivityLog::create([
            'user_id'=>\auth('web')->user()->id,
            'action'=>"marked property as bought",
        ]);
        if($markProperty->update(['bought_by'=>$request->input('user'),'bought'=>1])){
            ActivityLog::create([
                $male="Updated his/her Profile",
                'user_id'=>\auth('web')->user()->id,
                'action'=>" Marked Property as Bought",]);
            return redirect()->back()->with('success',GeneralController::error_success('Successful','Selected User Has Bought The Property'));
        }
    }
}