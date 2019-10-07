<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 7:54 AM
 */
?>
<div class="row">
    <div class="col">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean navbar-inverse navbar-fixed-top" style="background-color:darkgreen;color:rgb(245,247,249);padding-top: 20px">
            <div class="container-fluid">
                <h5 class="dashboard" href="#" style="position: absolute;color: white;top:5px;font-weight: 900">ADMIN DASHBOARD</h5>
                <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler aTrigger"><span class="sr-only" style="background: white;right: 0">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    @if(auth()->guard('admin')->check())
                    <ul class="nav navbar-nav" style="right:0;">
                        @if(\auth()->guard('admin')->user()->previlage==1)
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admins')}}" style="color:white;font-size:20px;">Admins</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admin.register')}}" style="color:white;font-size:20px;">Add Admin</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('adminLog')}}" style="color:white;font-size:20px;">A_A Log</a></li>
                        @endif
                            <li class="dropdown text-info" style="margin-top: -20px;">
                              <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle nav-link dropdown-toggle" style="color:darkgray">
                                  @if(\auth()->guard('admin')->user()->profilePicture==null)
                                    <img src="{{url('assets/img/download.png')}}"style="width:60px;height:60px;" class="rounded-circle">
                                    {{auth()->guard('admin')->user()->username}}
                                  @elseif(\auth()->guard('admin')->user()->profilePicture==!null)
                                    <img src="{{url('assets/uploads/adminProfile/'.auth()->guard('admin')->user()->profilePicture)}}" width="70" height="70" class="rounded-circle" />
                                    {{auth()->guard('admin')->user()->username}}
                                  @endif
                                </a>
                                <div role="menu" class="dropdown-menu">
                                    <a role="presentation" href="{{route('adminProfileUpdate')}}" class="dropdown-item"><i class="fa fa-user" style="color:#002868;font-size:22px;"></i>Edit Profile</a>
                                    <a role="presentation" href="{{route('admin.logout')}}" class="dropdown-item"><i class="fa fa-sign-out" style="color:#002868;font-size:22px;"></i>Logout</a>
                                </div>
                            </li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </div>
</div>
