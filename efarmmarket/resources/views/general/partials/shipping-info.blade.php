<?php
/**
 * Created by PhpStorm.
 * User: ABBAYARO
 * Date: 9/22/2019
 * Time: 1:55 PM
 */
?>
@if(!auth()->guest())
    <?php $char = strtoupper(substr($data['transactionId'],0,1))?>
    @if($char==='W')
        <?php  $status = $obj->payment_status?>
    @elseif($char==='O')
        <?php $status = $obj->paymentStatus?>
    @elseif($char==='B')
        <?php  $status = $obj->payment_status?>
        <div>

        </div>
    @endif
    <?php  $status = $obj->payment_status?>
    <div class="row">
        <div class="col-8 offset-2">
            @if($status==1)
                <span class="pt-2" style="border-radius: 50px; text-align:center;width: 50px;height: 50px;display: block;margin-left: auto;margin-right: auto;background-color: green">
                            <i style="color: black" class="fa fa-check fa-2x"></i>
                        </span>
                <p>&nbsp;</p>
            @elseif(in_array($status,[0,2,3]) && !is_null($status))
                <span class="pt-2" style="border-radius: 50px; text-align:center;width: 50px;height: 50px;display: block;margin-left: auto;margin-right: auto;background-color: red">
                            <i style="color: black" class="fa fa-times fa-2x"></i>
                        </span>
                <p>&nbsp;</p>
            @endif
            <div class="row">
                @if(is_null($status))
                    <div class="col-6 ">
                    <h5 class="text-center text-black-50 text-capitalize my-3"  style="font-weight: bolder">shipping information</h5>
                    <form method="post" action="{{route('payment',['transactionId'=>$data['transactionId'],])}}" style="box-shadow:-1px 2px 3px 4px silver;padding-top:10px;padding-right:50px;padding-bottom:10px;padding-left:50px;">
                        @csrf
                        <div class="form-group mt-3">
                            @if($errors->has('address'))
                                <small class="form-text text-danger">{{$errors->first('address')}}</small>
                            @endif
                            <div class="input-group"><input type="text" value="{{old('address')}}" placeholder="Address Line" name="address" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            @if($errors->has('city'))
                                <small class="form-text text-danger">{{$errors->first('city')}}</small>
                            @endif
                            <div class="input-group"><input type="text" value="{{old('city')}}" placeholder="City" name="city" class="form-control" /></div>
                        </div>
                        <div class="form-group">
                            @if($errors->has('state'))
                                <small class="form-text text-danger">{{$errors->first('state')}}</small>
                            @endif
                            <div class="input-group"><input type="text" value="{{old('state')}}" placeholder="State" name="state" class="form-control" /></div>
                        </div>
                        <div class="form-group text-right"><button class="btn btn-success" type="submit" style="margin-top: 35%"><i class="fa fa-credit-card text-danger"></i> proceed to payment</button></div>
                    </form>
                    </div>
                @endif
                <div class="col-6">
                    <div class="row">
                        <div class="row mt-5 mb-5">
                            <?php
                            $orderDetail=\Gloudemans\Shoppingcart\Facades\Cart::content();
                            $contentObj=$orderDetail->first();

                            //dd($contentObj)
                            ?>
                            @include('templates.partials.alerts')
                            <div class="col">
                                <div class="card" style="margin: 0px 0px;word-spacing: 5px;line-break: strict">
                                    <div class="card-body text-capitalize" id="receipt">
                                        <h4 class=" mb-2 text-uppercase text-center" style="color: black;font-weight: bold">E-farm Market</h4>
                                        <span class="text-center  d-block " style="color:black;font-weight: bold">Address:No.45B gidan maikudi riiyar xaki</span>
                                        <span class="d-inline-block"><i class="fa-phone fa text-success"></i>+2348065601971 </span>
                                        <span class="d-inline-block" style="float: right;color:green"><b>Web Site:</b> www.efarmmarket.com</span>
                                        <hr>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                Fullname
                                            </div>
                                            <div class="col-6">
                                               {{$data['fullname']}}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                Phone
                                            </div>
                                            <div class="col-6">
                                                {{$data['phone']}}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                Email
                                            </div>
                                            <div class="col-6">
                                                {{$data['email']}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-center" style="font-weight: bolder">products Details</h5>
                                        <div class="row my-2">
                                            <div class="col">
                                                <table class="table table-borderless table-striped table-responsive text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Product price</th>
                                                        <th>Product Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                                        <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->price}}</td>
                                                            <td>{{$item->qty}}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th>Tax</th>
                                                        <th>Subtotal</th>
                                                        <th>Grand Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</td>
                                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                                        <td>{{$data['amount']}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-12">
                                        <span class="d-block">Date/Time:
                                            {{\Carbon\Carbon::now()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!is_null($status))
        <script>
            window.print();
        </script>
    @endif
@endif
