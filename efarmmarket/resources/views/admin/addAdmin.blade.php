<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 1:07 PM
 */
?>
@extends('admin.partials.default')
@section ('adminContent')
    <div class="row mb-5">
        <div class="col">
            <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Add Admin</h3>
            <div class="row pt-2" style="">
                <div class="col" >
                    @include('templates.partials.alerts')
                    <form method="post" action="{{route('admin.register')}}" enctype="multipart/form-data" style="margin: 0px 15%;box-shadow: -1px 3px 3px 3px;padding: 20px">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload Image</span>
                                </div>
                                <input class="form-control" {{old('profilePicture')}}  type="file" name="profilePicture">
                            </div>
                            @if($errors->has('profilePicture'))
                                <small class="form-text text-danger">{{$errors->first('profilePicture')}}</small>
                            @endif
                        </div>
                    <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" value="{{old('firstName')}}"  name="firstName" type="text" placeholder="Firstname">
                            </div>
                        @if($errors->has('firstName'))
                            <small class="form-text text-danger">{{$errors->first('firstName')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" value="{{old('lastName')}}"  name="lastName" type="text" placeholder="Lastname">
                        </div>
                        @if($errors->has('lastName'))
                            <small class="form-text text-danger">{{$errors->first('lastName')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" value="{{old('username')}}"   name="username" type="text" placeholder="Username">
                            </div>
                            @if($errors->has('username'))
                                <small class="form-text text-danger">{{$errors->first('username')}}</small>
                            @endif
                        </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" value="{{old('email')}}"   name="email" type="email" placeholder="Email">
                        </div>
                        @if($errors->has('email'))
                            <small class="form-text text-danger">{{$errors->first('email')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" value="{{old('phone')}}"  name="phone" placeholder="Phone Number"  class="form-control" >
                        </div>
                        @if($errors->has('phone'))
                            <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <select  name="previlage" class="form-control">
                            <option value="" selected>Select Privilege</option>
                                <option @if(old('previlage')==1){{"selected"}}@endif value="1">Full Privilege Admin</option>
                                <option @if(old('previlage')==0){{"selected"}}@endif value="0">Ordinary Admin</option>
                        </select>
                        @if($errors->has('previlage'))
                            <small class="form-text text-danger">{{$errors->first('previlage')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Address"   name="address" autocomplete="on" class="form-control">{{old('address')}}</textarea>
                        @if($errors->has('address'))
                            <small class="form-text text-danger">{{$errors->first('address')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" name="password" type="password" placeholder="password">
                        </div>
                        @if($errors->has('password'))
                            <small class="form-text text-danger">{{$errors->first('password')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" name="password_confirmation" type="password" placeholder="re-peat password">
                        </div>
                        @if($errors->has('password_confirmation'))
                            <small class="form-text text-danger">{{$errors->first('password_confirmation')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark btn-block" type="submit">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection