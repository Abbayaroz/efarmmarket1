<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 11:59 AM
 */

namespace EfarmMarket\Http\Controllers;


use EfarmMarket\Models\ActivityLog;
use EfarmMarket\Models\Contact;
use EfarmMarket\Models\ContactUs;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\ManageFooterNav;
use EfarmMarket\Models\PicturesGallery;
use EfarmMarket\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    private  $more;
    public function landingPage(gallery $gallery){
        $sliderImages = $gallery->sliderImage()->limit(10);
        $properties= $gallery->unBoughtProperties()->where('paymentStatus',1)->where('bought',0)->inRandomOrder()->latest();
        return view('landingPage')->with('title', 'welcome | home')
            ->with('properties',$properties)
            ->with('type',null)
            ->with('images',$sliderImages);
    }
    public function aboutUs(ManageFooterNav $manageFooterNav){
        $manageFooterNavObj=$manageFooterNav->showAbout()->where('category','1')->first();

        return view('aboutUs')
            ->with('about',$manageFooterNavObj)
            ->with('title', 'About us');
    }
    public function contactUs(Contact $contact){
        return view('contactUs')
            ->with('title', 'Contact us')
            ->with('email',$contact->email())
            ->with('phone',$contact->phone())
            ->with('address',$contact->address());
    }
    public function postContactUs(Request $request){
        $this->validate($request,[
            'fullname'=>'required|present|min:6|max:50',
            'email'=>'email|present|nullable',
            'phone'=>['required','present','numeric',
                function($attribute, $value, $fail)
                {
                    if (strlen($value) < 11) {
                        $fail("The number can not be less than 11 digits");
                    } elseif (strlen($value) > 11) {
                        $fail("The number can not be greater than 11 digits");
                    }
                }
            ],
            'best_time_call'=>'present|nullable',
            'body'=>'present|required|min:6|max:1000',
        ]);

        if(ContactUs::create([
            'fullname'=>$request->input('fullname'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'best_time_call'=>$request->input('best_time_call'),
            'body'=>$request->input('body'),
        ])){
            return redirect()->back()->with('success',GeneralController::error_success('Successful','successfully Sent'));
        }
    }
    public function privacyPolicy(ManageFooterNav $manageFooterNav){
        $manageFooterNavObj=$manageFooterNav->showAbout()->where('category','4')->first();
        return view('privacyPolicy')
            ->with('policy',$manageFooterNavObj)
            ->with('title', 'Privacy | Policy');
    }
    public function services(ManageFooterNav $manageFooterNav){
        $manageFooterNavObj=$manageFooterNav->showAbout()->where('category','2')->first();
        return view('services')
        ->with('services',$manageFooterNavObj)
        ->with('title', 'Services | we | Offer');
}
    public function terms(ManageFooterNav $manageFooterNav){
        $manageFooterNavObj=$manageFooterNav->showAbout()->where('category','3')->first();
        return view('terms')
            ->with('terms',$manageFooterNavObj)
            ->with('title', 'terms | and | condition');
    }
    public function readMore(Request $request, $moreDetails){
        if(auth()->guard('web')->check()){
            if(auth()->guard('web')->user()->customerType==1){
                $this->more = $moreDetails;
                $moreDetails = gallery::where('id',$moreDetails)
                    ->where('user_id',auth()->guard('web')->user()->id)
                    ->orWhere(function ($query){
                        $query->where('user_id','<>',auth()->guard('web')->user()->id)
                            ->where('paymentStatus',1)->where('id',$this->more)
                            ->where('bought',0);
                    });
            }else{
                $moreDetails = gallery::where('id',$moreDetails)
                    ->where('paymentStatus',1)->where('bought',0);
            }
        }else{
            $moreDetails = gallery::where('id',$moreDetails)
                ->where('paymentStatus',1);
        }
        if($moreDetails->count()<=0){
            return redirect()->route('homepage')
            ->with('failure',GeneralController::error_success('Invalid','Selection Not Found'));
        }
        if ($request->query('type') == null) {
        return view('general.readMore')
            ->with('title', 'more')->with('more',$moreDetails->first());
        } elseif ($request->query('type') == "js") {
          return view('general.partials.readMore');
        }
        }
    public function search(Request $request){
        $this->validate($request,[
            'query'=>'required|present|min:1'
        ]);
        $quary=$request->input('query');
        $products=gallery::where('name','like',"%$quary%")
            ->orWhere('price','like',"$quary")
            ->orWhere('description','like',"%$quary%")
            ->paginate(12);
        if(\auth()->guard('web')->check()){
            ActivityLog::create([
                'action'=>"search for".$quary,
                'user_id'=>\auth()->guard('web')->user()->id,
            ]);}

        return view('general.search')
            ->with('products',$products)
            ->with('title','Search|Result');
    }


}