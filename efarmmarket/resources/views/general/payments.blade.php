<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/4/2018
 * Time: 3:37 AM
 */
?>
@extends('templates.default')
@section('content2')
    <div id="loader">
        <form method='POST' id='payform' action='//voguepay.com/pay/' >
            <input type='hidden' name='v_merchant_id' value='{{$payments['merchantId']}}' />
            <input type='hidden' name='merchant_ref' value='{{$payments['merchantRef']}}' />
            <input type='hidden' name='memo' value='{{$payments['memo']}}' />

            <input type='hidden' name='notify_url' value='{{$payments['notifyUrl']}}' />
            <input type="hidden" name="cur" value="NGN">
            <input type='hidden' name='success_url' value='{{$payments['successUrl']}}' />
            <input type='hidden' name='fail_url' value='{{$payments['failedUrl']}}' />
            <input type='hidden' name='developer_code' value='{{$payments['developerCode']}}' />


               <input type='hidden' name='total' value='{{$payments['amount']}}' />


            <input type='hidden' name='name' value='{{$payments['customerName']}}'/>
            <input type='hidden' name='email' value='{{$payments['email']}}'/>
            <input type='hidden' name='phone' value= '{{$payments['phone']}}'/>

            ##notification triggers for inline payments only##
            <input type='hidden' name='closed' value='closedFunction'>
            <input type='hidden' name='success' value='successFunction'>
            <input type='hidden' name='failed' value='failedFunction'>

        </form>
    </div>
@endsection