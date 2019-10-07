<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/16/2018
 * Time: 5:50 AM
 */
?>
@extends('admin.partials.default')
@section ('adminContent')

<div class="row mb-5">
    <div class="col-lg-10 offset-lg-1">
        <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Requery transactions</h3>
        <div>
            <ul class="nav nav-tabs" style="background: white">
                <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-1" class="nav-link @if(is_null(session()->get('tab'))){{"active"}}@endif text-info">V Transaction</a></li>
                <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-2" class="nav-link @if(session()->get('tab')==2){{"active"}}@endif text-info">Wallet Transaction</a></li>
                <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-3" class="nav-link @if(session()->get('tab')==3){{"active"}}@endif text-info">Bought Property</a></li>
                <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-4" class="nav-link @if(session()->get('tab')==4){{"active"}}@endif text-info">Advert Property</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane  @if(is_null(session()->get('tab'))){{"active"}}@endif " id="tab-1">
                    <div class="row pt-5">
                            <div class="col-lg-12">
                                <h4 class="text-capitalize text-center text-dark mb-2">requery</h4>
                                <form action="{{route('requery')}}" method="post">
                                    @csrf
                                    @include('templates.partials.alerts')
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="transaction" type="text" class="form-control" />
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn btn-dark">Requery <i class="fa fa-refresh fa-spin"></i></button>
                                            </div>
                                            @if($errors->has('transaction'))
                                                <small class="form-text text-danger">{{$errors->first('transaction')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                    </div>
                    <div class="table-responsive @if(!session()->has('transaction')){{"d-none"}}@endif">
                        <table class="table">
                            <?php $transaction = session()->get('transaction');?>
                            <thead>
                            <tr>
                                <th>Transaction Details</th>
                                <th>Information</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Merchant_id</td>
                                <td><span> {{$transaction['merchant_id']}}</span></td>
                            </tr>
                            <tr>
                                <td>Transaction_id</td>
                                <td><span>{{$transaction['transaction_id']}}</span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><span>{{$transaction['email']}}</span></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span>{{$transaction['total']}}</span></td>
                            </tr>
                            <tr>
                                <td>Merchant_ref</td>
                                <td><span>{{$transaction['merchant_ref']}}</span></td>
                            </tr>
                            <tr>
                                <td>Memo</td>
                                <td><span>{{$transaction['memo']}}</span></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><span>{{$transaction['status']}}</span></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><span>{{$transaction['date']}}</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane @if(session()->get('tab')==2){{"active"}}@endif " id="tab-2">
                        <div class="row pt-5">
                            <div class="col-lg-12">
                                <h3 class="text-capitalize text-center text-dark mb-2">Requery Wallet Transaction</h3>
                                <form action="{{route('failed.transactions')}}" method="post">
                                    @csrf
                                    @include('templates.partials.alerts')
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="wUsername" placeholder="Username" type="text" class="form-control" />
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn btn-dark">Requery <i class="fa fa-refresh fa-spin"></i></button>
                                            </div>
                                        </div>
                                        @if($errors->has('wUsername'))
                                            <small class="form-text text-danger">{{$errors->first('wUsername')}}</small>
                                        @endif
                                    </div>

                                </form>
                            </div>

                        </div>
                    @if(session()->has('tab'))
                        @if(session()->get('tab')==2)
                            @include('admin.partials.transactionTable')
                        @endif
                    @endif

                </div>
                <div role="tabpanel" class="tab-pane @if(session()->get('tab')==3){{"active"}}@endif " id="tab-3">
                    <div class="row pt-5">
                        <div class="col-lg-12">
                            <h3 class="text-capitalize text-center text-dark mb-2">Requery Buyers Transaction</h3>
                            <form action="{{route('btran')}}" method="post">
                                @include('templates.partials.alerts')
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="bUsername" placeholder="Username" type="text" class="form-control" />
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn btn-dark">Requery <i class="fa fa-refresh fa-spin"></i></button>
                                        </div>
                                    </div>
                                    @if($errors->has('bUsername'))
                                        <small class="form-text text-danger">{{$errors->first('bUsername')}}</small>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>
                    @if(session()->has('tab'))
                        @if(session()->get('tab')==3)
                            @include('admin.partials.transactionTable')
                        @endif
                    @endif

                </div>
                <div role="tabpanel" class="tab-pane @if(session()->get('tab')==4){{"active"}}@endif " id="tab-4">

                        <div class="row pt-5">
                            <div class="col-lg-12">
                                <h3 class="text-capitalize text-center text-dark mb-2">Requery Advert Transaction</h3>
                                <form action="{{route('advertTran')}}" method="post">
                                    @csrf
                                    @include('templates.partials.alerts')
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="advertUsername" type="text" placeholder="Username" class="form-control" />
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn btn-dark">Requery <i class="fa fa-refresh fa-spin"></i></button>
                                            </div>
                                        </div>
                                        @if($errors->has('advertUsername'))
                                            <small class="form-text text-danger">{{$errors->first('advertUsername')}}</small>
                                        @endif
                                    </div>
                                </form>
                            </div>

                        </div>
                    @if(session()->has('tab'))
                        @if(session()->get('tab')==4)
                            @include('admin.partials.transactionTable')
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
