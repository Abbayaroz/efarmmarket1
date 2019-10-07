<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 7:06 AM
 */
?>

@extends ('admin.partials.default')
@section ('content3')
<div class="login-clean" style="background-color:rgb(225,240,252); margin-top: -50px">
    @include('templates.partials.alerts')
    <form method="post" action="{{route('admin.login')}}" style=" box-shadow:-1px 4px 26px 11px rgba(0,0,0,0.7);">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="fa fa-lock text-dark"></i>
        </div>
        <div class="form-group">
       <input class="form-control" type="text" name="username" placeholder="Username" style="width:250px">
        </div>
        @if($errors->has('username'))
            <small class="form-text text-danger">{{$errors->first('username')}}</small>
        @endif
        <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        @if($errors->has('password'))
            <small class="form-text text-danger">{{$errors->first('password')}}</small>
        @endif
        <div class="form-group"><button class="btn btn-dark btn-block" type="submit">Log In</button></div>
        <!--<a href="#" class="forgot">Forgot your email or password?</a>-->
    </form>
</div>
@endsection