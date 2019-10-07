<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 12/6/2018
 * Time: 10:17 PM
 */
?>
@extends('admin.partials.default')
@section('adminContent')
    <div class="register-photo" style="background: white">
        @include ('templates.partials.alerts')
        <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Update Profile</h3>
        <div class="form-container" >
            <form method="post" action="{{route('adminProfileUpdate')}}" enctype="multipart/form-data" style="box-shadow: -1px 4px 26px 3px;">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" value="{{auth()->guard('admin')->user()->username}}" class="form-control" style="margin-bottom:10px;" readonly/>
                    @if($errors->has('username'))
                        <small class="form-text text-danger">{{$errors->first('username')}}</small>
                    @endif
                    <input type="email" name="email" value="{{auth()->guard('admin')->user()->email}}" class="form-control" readonly/>
                    @if($errors->has('email'))
                        <small class="form-text text-danger">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" name="phone"  placeholder="Phone" class="form-control" />
                    @if($errors->has('phone'))
                        <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="previousPassword" placeholder="Old Password" class="form-control" />
                    @if($errors->has('previousPassword'))
                        <small class="form-text text-danger">{{$errors->first('previousPassword')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="New Password" class="form-control" />
                    @if($errors->has('password'))
                        <small class="form-text text-danger">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Password (repeat)" class="form-control" />
                    @if($errors->has('password_confirmation'))
                        <small class="form-text text-danger">{{$errors->first('password_confirmation')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Upload Profile<i class="fa fa-upload "></i></span></div>
                        <input type="file" class="form-control" name="profilePicture" />
                        @if($errors->has('profilePicture'))
                            <small class="form-text text-danger">{{$errors->first('profilePicture')}}</small>
                        @endif
                        <div class="input-group-append"></div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark btn-block" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
