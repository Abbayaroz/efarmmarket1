<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/30/2018
 * Time: 3:58 AM
 */

namespace EfarmMarket\Http\Controllers\owner;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Http\Controllers\GeneralController;
use EfarmMarket\Models\ActivityLog;
use EfarmMarket\Models\BuyersTransaction;
use EfarmMarket\Models\Charge;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\PicturesGallery;
use EfarmMarket\Models\RequestOnfiveBuying;
use EfarmMarket\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerAuth extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except('viewOwnerDetails');
    }
    public function receipt(){
        return view('general.receipt')->with('title', 'print receipt');
    }

    public function ownersMessages(Request $request)
    {
        if ($request->query('type') == null) {
            return view('general.usersMessages')->with('title', 'messages');
        } elseif ($request->query('type') == "js") {
            return view('general.partials.ownersMessages');
        }
    }
    public function ownersPost(Request $request,gallery $gallery)
    {
        if(auth()->guard('web')->user()->customerType==1) {
            $properties = auth()->guard('web')->user()->myProperties();
        }else{
            $properties= auth()->guard('web')->user()->myAcknowledgedBoughtProperties();
        }
        if ($request->query('type') == null) {
            return view('general.usersPost')
                ->with('title', 'My | Post')
                ->with('properties',$properties)
                ->with('type',null);
        }
        elseif ($request->query('type') == "js") {
            return view('general.partials.ownersPost')
                ->with('properties',$properties)
                ->with('type',$request->query('type'));
        }
        elseif ($request->query('type')=='paid'){
           $properties = auth()->guard('web')->user()->myPaidProperties();
           return view('general.partials.ownersPost')
               ->with('properties',$properties)
               ->with('type',$request->query('type'));
        }
        elseif ($request->query('type')=='unPaid'){
            $properties = auth()->guard('web')->user()->myUnPaidProperties();
            return view('general.partials.ownersPost')
                ->with('properties',$properties)
                ->with('type',$request->query('type'));
        }
        elseif ($request->query('type')=='sold'){
            $properties = auth()->guard('web')->user()->mySoldProperties();
            return view('general.partials.ownersPost')
                ->with('properties',$properties)
                ->with('type',$request->query('type'));
        }
        elseif ($request->query('type')=='bought'){
            $properties = auth()->guard('web')->user()->myAcknowledgedBoughtProperties();
            return view('general.partials.ownersPost')
                ->with('properties',$properties)
                ->with('type',$request->query('type'));
        }
        elseif ($request->query('type')=='access'){
            $accessed = auth()->guard('web')->user()->myPaidBoughtProperties();
            $accessedArray=$accessed->pluck('gallery_id')->toArray();
            $properties = gallery::whereIn('id',$accessedArray);
            return view('general.partials.ownersPost')
                ->with('properties',$properties)
                ->with('type',$request->query('type'));
        }
    }
    public function ownersProfileUpdate(Request $request)
    {
        if ($request->query('type') == null) {
            return view('general.usersProfileUpdate')->with('title', 'Update | Profile');
        } elseif ($request->query('type') == "js") {
            return view('general.partials.ownersProfileUpdate');
        }
    }
    public function ownersWallet(Request $request)
    {
        if ($request->query('type') == null) {
            return view('general.walletRecharge')->with('title', 'My | Wallet');
        } elseif ($request->query('type') == "js") {
            return view('general.partials.walletRecharge');
        }
    }
    public function propertyReg(Request $request)
{
    if ($request->query('type') == null) {
        return view('owners.propertyReg')->with('title', 'Register | Property');
    } elseif ($request->query('type') == "js") {
        return view('owners.partials.propertyReg');
    }
}
    public function updateProperty(Request $request)
    {
        if ($request->query('type') == null) {
            return view('owners.updateProperty')->with('title', 'Update | Property');
        } elseif ($request->query('type') == "js") {
            return view('owners.partials.updateProperty');
        }

    }
    public function viewOwnerDetails($username,$property){
        $username = decrypt($username);
        $property = decrypt($property);
        $user = User::where('username',$username)->first();
        if(is_null($user)){
            return redirect()
                ->route('homepage')
                ->with('failure',
                    GeneralController::error_success('Whoops','Something Went Wrong'));
        }
        \auth('web')->loginUsingId($user->id);
        $propertyObj = gallery::findOrFail($property);
        $owner = User::findOrFail($propertyObj->user_id);
        $this->middleware('auth:web');
        return view('owners.ownersDetails')
            ->with('owner',$owner)
            ->with('property',$propertyObj)
            ->with('title','Owners Information');
    }
    public function removeProperty(gallery $removeProperty){
        $removeProperty->delete();
        $images=PicturesGallery::whereIn('gallery_id',$removeProperty)->first();
        foreach ($images->get() as $remove) {
            $remove->delete();
        }
        return redirect()->back()->with('success',GeneralController::error_success('deleted','deleted successfully'));
    }

}