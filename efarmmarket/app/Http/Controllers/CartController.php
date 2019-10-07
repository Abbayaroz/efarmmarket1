<?php

namespace EfarmMarket\Http\Controllers;

//use EfarmMarket\Models\Cart;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\Shoppingcart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems=Cart::content();
        return view('cart.index',compact('cartItems'))
            ->with('title','shopping cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeItem=Cart::store(auth('web')->user()->id);

// To store a cart instance named 'wishlist'
        Cart::instance('wishlist')->store($storeItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=gallery::find($id);
        $transactionId=$product->transactionId;
        Cart::add($id,$product->name,1,$product->price);
        if ( Shoppingcart::where( 'Identifier', '=', $transactionId )->exists()){
            return redirect()->back()->with('success',GeneralController::error_success('added','item added to the cart successfully'));
        }else {
            Cart::instance(auth('web')->user()->id)->store($transactionId);
        }
        return redirect()->back()->with('success',GeneralController::error_success('added','item added to the cart successfully'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(gallery $gallery,Request $request, $id)
    {
        ///$galleryObj=$gallery->getAllProperties()->where('id',$id)->first();
        Cart::update($id,$request->qty);
        return redirect()->back()->with('success',GeneralController::error_success('updated','item updated to '. $request->qty .' successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}
