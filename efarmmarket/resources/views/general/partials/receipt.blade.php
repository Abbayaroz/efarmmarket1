<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/3/2018
 * Time: 7:31 AM
 */
?>
<?php $char = strtoupper(substr($data['transactionId'],0,1))?>
@if($char==='W')
    <?php  $status = $obj->payment_status?>
@elseif($char==='O')
    <?php $statuses = $obj->paymentStatus?>
@elseif($char==='B')
    <?php  $status = $obj->payment_status?>
    <div>

    </div>
@endif

<div class="row mt-5 mb-5">
    @include('templates.partials.alerts')
        <div class="col-8 offset-2">
            <div class="card" style="margin: 0px 15%;word-spacing: 5px;line-break: strict">
<?php  $status = $obj->payment_status?>
        <div class="card-body text-capitalize" id="receipt">
            <h4 class=" mb-2 text-uppercase text-center" style="color: black;font-weight: bold">E-farm Market</h4>
            <span class="text-center  d-block " style="color:black;font-weight: bold">Address:No.45B gidan maikudi riiyar xaki</span>
            <span class="d-inline-block"><i class="fa-phone fa text-success"></i>+2348065601971 </span>
            <span class="d-inline-block" style="float: right;color:green"><b>Web Site:</b> www.efarmmarket.com</span>
            <hr>
            <div class="row my-2">
                <div class="col-6">
                    Amount
                </div>
                <div class="col-6">
&#8358; {{$data['amount']}}
        </div>
    </div>
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
            Transaction Id
        </div>
        <div class="col-6">
{{$data['transactionId']}}
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
@if(!is_null($status))
    <div class="row my-2">
        <div class="col-6">
            Payment Status
        </div>
        <div class="col-6">
<?php if($status==1){
        $payment="paid";
    } ?>
    {{$payment}}
            </div>
        </div>
@endif
        <div class="row my-2">
            <div class="col-6">
                Date/Time
            </div>
            <div class="col-6">
{{\Carbon\Carbon::now()}}
        </div>
    </div>
    <h4 class="card-title">@if($status==1)
    <span class="pt-2" style="border-radius: 50px; text-align:center;width: 50px;height: 50px;display: block;margin-left: auto;margin-right: auto;background-color: green">
        <i style="color: black" class="fa fa-check fa-2x text-white"></i>
    </span>
    <p>&nbsp;</p>
                    @elseif(in_array($status,[0,2,3]) && !is_null($status))
    <span class="pt-2" style="border-radius: 50px; text-align:center;width: 50px;height: 50px;display: block;margin-left: auto;margin-right: auto;background-color: red">
        <i style="color: black" class="fa fa-times fa-2x"></i>
    </span>
    <p>&nbsp;</p>
                    @endif
        </h4>
    </div>
</div>
</div>
@if($statuses===1)
    <script>
        window.print();
    </script>
    <div class="row">
            <div class="col text-right">
                @if(auth('web')->check())
                    <?php $prop = auth('web')->user()->findPaidProperties($data['transactionId']);?>
                    @if($prop->count()>0)
                        <?php
                        \LaravelQRCode\Facades\QRCode::url(route('owner.detail',['username'=>encrypt(auth('web')->user()->username),'property'=>encrypt($data['transactionId'])]))->svg()
                        ?>
                    @endif
                @endif
            </div>
        </div>
@endif
</div>
@if(is_null($status)&& $status!==0)
    <div class="row">

        @if($char!=='W')
            <div class="col-3 offset-3">
                <a href="{{route('paywithwallet',['mRef'=>$data['transactionId']])}}" style="background: rgb(9,48,86);color:white"  class="btn btn-block">Pay From Wallet<i class="fa fa-google-wallet"></i></a>
            </div>
        @endif
        <div class="col-3">
            <a href="{{route('payment',['transactionId'=>$data['transactionId'],])}}" class="btn btn-info btn-block"> Pay On Vogue Pay <i class="fa fa-money"></i></a>
        </div>
    </div>
@endif
@if(!is_null($statuses))
    <script>
        window.print();
    </script>
@endif
