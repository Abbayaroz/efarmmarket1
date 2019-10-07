<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/30/2018
 * Time: 2:47 AM
 */
?>
<div class="row" id="buyerpagerow1" style="background: white;margin-top:0px;margin-bottom: 20px;">
    <div class="col-sm-5 col-md-5 col-lg-4" id="sidebar" style="display:none;">
        <ul id="sideUl" class="list-group">
            @if (\auth()->guard('web')->user()->customerType==0)
                <li><a class="sidebarPageLoader" href="{{route('owner.post')}}">Gallery</a></li>
                <li><a class="sidebarPageLoader" href="{{route('owner.wallet')}}">Wallet</a></li>
                <li><a href="{{route('owners.profileUpdate')}}" class="sidebarPageLoader">Update Profile</a></li>
            @elseif (\auth()->guard('web')->user()->customerType==1)
                <li><a href="{{route('owner.post')}}" class="sidebarPageLoader">Gallery</a></li>
                <li><a href="{{route('owner.property.upload')}}" class="sidebarPageLoader">Upload Property</a></li>
                <li><a href="{{route('owner.wallet')}}" class="sidebarPageLoader">Manage Wallet</a></li>
                <li><a href="{{route('owners.profileUpdate')}}" class="sidebarPageLoader">Update Profile</a></li>
            @endif
        </ul>
    </div>
    <div class="col" id="returnedData">
        <span class="btn" id="hideSidebar" style="padding: 5px;margin: 0px;color:white;background:darkgreen"><b>Open &#9783;</b></span>
        <div class="form-group sidebarPageLoader">
        </div>
        @yield('content2')
    </div>
</div>
