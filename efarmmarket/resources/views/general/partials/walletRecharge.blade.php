<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/10/2018
 * Time: 9:02 AM
 */
?>
<div class="header-green pt-5">
        <div class="container hero">
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-5 offset-xl-1">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Current Balance:<strong>&#8358;{{auth()->guard('web')->user()->myWallet()->first()->amount}}</strong></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recharge Your Wallet</h4>
                                    <form method="post" action="{{route('recharge.wallet')}}">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                                </div>
                                                <input type="text" placeholder="amount" name="amount" value="{{old('amount')}}" class="form-control" />
                                            </div>
                                            @if($errors->has('amount'))
                                                <small class="form-text text-danger">{{$errors->first('amount')}}</small>
                                            @endif
                                        </div>
                                        @csrf
                                        <div class="form-group">
                                            <button class="btn btn-block" type="submit" style="background:darkgreen;color:white">Recharge Now</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 offset-lg-1 offset-xl-0 d-none d-lg-block">
                    <img src="{{url('assets/img/recharge_wallet_mobile_wallet_6813143.jpg')}}" style="width:100%;" />
                </div>
            </div>
        </div>
    </div>

