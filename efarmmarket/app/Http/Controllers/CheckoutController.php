<?php

namespace EfarmMarket\Http\Controllers;

use EfarmMarket\Models\BuyersTransaction;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\Order;
use EfarmMarket\Models\Shoppingcart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckout(Request $request,Shoppingcart $shoppingcart){
        $shoppingcartObj=$shoppingcart->showShoppingcart();
        //dd($shoppingcartObj);
        $transactionId=$shoppingcartObj->identifier;
       // if(!$galleryId->quantity == 0){
            $transaction_id ="B-".rand(1000,9999)."-".
               rand(1000,9999)."-".rand(1000,9999);
            $galleryObj=gallery::where('transactionId',$transactionId)->get()->first();
            //dd($galleryObj);
            BuyersTransaction::create([
                'user_id'=>auth()->guard('web')->user()->id,
                'gallery_id'=>$galleryObj->id,
                'amount'=>Cart::total(),
                'transaction_id'=>$transaction_id,
            ]);
        $propertyObj= BuyersTransaction::where('gallery_id',$galleryObj->id)->first();
       //dd($propertyObj);
        $amount = Cart::total();
        $email = auth()->guard('web')->user()->email;
        $fullname = auth()->guard('web')->user()->getFullName();
        $phone = auth()->guard('web')->user()->phone;
        $data = [
            "amount" => $amount, "fullname" => $fullname, "phone" => $phone,"email" => $email,
            "transactionId" => $transaction_id];
       // dd($data);
        if($propertyObj!==null) {
            if ($request->query('type') == null) {
                return view('general.shipping-info')
                    ->with('data', $data)
                    ->with('obj',$propertyObj)
                    ->with('title', 'shipping-info');
            } elseif ($request->query('type') == "js") {
                return view('general.partials.shipping-info')
                    ->with('data', $data)
                    ->with('obj',$propertyObj);
            }
        }
    }
    public function postCheckout(Request $request){
        $this->validate($request,[
            'address'=>'required|present',
            'state'=>'required|present',
            'city'=>'required|present',
            ]);
        if(Order::create([
            'user_id'=>auth()->guard('web')->user()->id,
            'address'=>$request->input('address'),
            'state'=>$request->input('state'),
            'city'=>$request->input('city'),
        ]));
        return back();
    }
}
