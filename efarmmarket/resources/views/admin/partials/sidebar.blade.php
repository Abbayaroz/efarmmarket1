<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 7:56 AM
 */
?>
<style>
    a{
        color:white;
        text-decoration: none;
        text-decoration-line: none;
    }
    a:hover{
        text-decoration: none;
        transition: all 0.2s;
    }
</style>
<div class="row " style="padding:0% 10%;margin-top: -40px">
    <div class="col-1 col-sm-1 col-md-1 col-lg-1 " id="sidebar1">
        <div class="row">
            <div class="col">
                <button class="btn btn-success" type="button" id="trigger" style="margin:13px;padding:6px;border: none">
                    <b class="text-capitalize">open &#9783;</b>
                </button>
            </div>
        </div>
        <div class="row" id="sidebar" style="background:none;position:absolute;z-index:200;width:250px;display:none;">
            <div class="col" id="sidebar" style="background:none;color:rgb(255,255,255);z-index:100;width: inherit">
                <ul style="width: 100%;background-color:darkgreen;z-index: 100;padding:0px">
                    @if(\auth()->guard('admin')->user()->previlage==1)
                    <li ><a href="{{route('admin.statistics')}}">Sales Statistics</a></li>
                    @endif
                    <li><a href="{{route('failed.transactions')}}">Transactions</a></li>
                    <li><a href="{{route('users.page')}}">View Users</a></li>
                    @if(\auth()->guard('admin')->user()->previlage==1)
                    <li><a href="{{route('charges')}}">Manage Charges</a></li>
                    @endif
                    <li><a href="{{route('feedback')}}">Customers Messages</a></li>
                    <li><a href="{{route('activityLog')}}">Activity Logs</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-12">
        <div class="row">
            <div class="col">
                @yield ('adminContent')
            </div>
        </div>
    </div>
</div>
