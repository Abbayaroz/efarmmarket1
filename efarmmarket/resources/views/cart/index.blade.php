<?php
/**
 * Created by PhpStorm.
 * User: ABBAYARO
 * Date: 9/16/2019
 * Time: 8:16 PM
 */
?>
@extends('templates.default')
@section('content2')
    <a href="{{route('homepage')}}" class="btn btn-light text-success" style="position: fixed;z-index: 9;float: right">Continue Shopping</a>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h4 class="text-capitalize text-center">My Cart</h4>
            @include('templates.partials.alerts')
            <div class="row">
                    @if($cartItems->count() > 0)
                    @foreach($cartItems as $cartItem)
                        <?php
                        //dd($cartItem);
                        $image=\EfarmMarket\Models\gallery::find($cartItem->id);
                        $imageObj = $image->propertyImages()->first();
                        ?>
                    <div class="col-4">
                        <a href="{{route('readMore',['moreDetails'=>$cartItem->id])}}">
                            <img class="img-fluid" src="{{url('assets/uploads/GalleryPictures/'.$imageObj->pictures)}}" style="width:100%;height: 150px">
                        </a><br/>
                        <span class="d-block">Product Name:{{$cartItem->name}}</span>
                        <span class="d-block">Product Price: &#8358; {{$cartItem->price}}</span>
                            <form action="{{route('cart.update',['id'=>$cartItem->rowId])}}" method="PUT">
                                <label class="d-block">Add Quantity<input type="text" name="qty" value="{{$cartItem->qty}}" style="width: 50px;text-align: center">
                                <button class="btn-sm btn-success" type="submit" >OK</button></label>
                                <label class="d-block">Remove Product<a href="{{route('cart.destroy',['id'=>$cartItem->rowId])}}" class="btn-sm btn-danger" >X</a></label>
                            </form>
                    </div>
                    @endforeach

                    @else
                         <p class="text-danger text-center">your cart is empty <i class="fa fa-shopping-cart"></i> </p>
                    @endif
            </div>

        </div>
        @if(\Gloudemans\Shoppingcart\Facades\Cart::count()>0)
        <div class="col-2 text-black-50">
            <div style="box-shadow: -1px 1px 2px 3px gray;z-index: 90;padding: 10px 3px;border-radius: 5%;float: right;position: fixed">
                <span class="d-block">Tax: {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</span>
                <span class="d-block">Sub Total: &#8358; {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                <span class="d-block">Grand Total: &#8358; {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span>
                <span class="d-block">Item Total: {{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                <a href="{{route('checkout')}}" class="btn-sm btn-info mt-3 sidebarPageLoader" style="float: right">Checkout</a>
            </div>
        </div>
       @endif
    </div>
@endsection
