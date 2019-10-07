<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 2:42 PM
 */
?>
@extends ('templates.default')
@section ('content')
    <div class="register-photo" style="background: white">
        <h3 class="text-uppercase text-center " style="font-weight: bolder">Register</h3>
        @include('templates.partials.alerts')
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" action="{{route('user.register')}}" style="box-shadow: -1px 3px 3px 3px rgba(0,0,0,0.7);">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" placeholder="firstname" value="{{old('firstname')}}" name="firstname" class="form-control newinputs" />
                    @if($errors->has('firstname'))
                        <small class="form-text text-danger">{{$errors->first('firstname')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" placeholder="lastname" name="lastname" value="{{old('lastname')}}" class="form-control newinputs" />
                    @if($errors->has('lastname'))
                        <small class="form-text text-danger">{{$errors->first('lastname')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Choose Username" value="{{old('username')}}" name="username" class="form-control newinputs" />
                    @if($errors->has('username'))
                        <small class="form-text text-danger">{{$errors->first('username')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" placeholder="phone" value="{{old('phone')}}" name="phone" class="form-control newinputs" />
                    @if($errors->has('phone'))
                        <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}" name="email"  class="form-control newinputs" />
                    @if($errors->has('email'))
                        <small class="form-text text-danger">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <select class="form-control newinputs" id="category" name="ownership" style="margin-top:10px;">
                        <option value=" "  selected>Register as</option>
                        <option @if(old('ownership')==1){{"selected"}}@endif value="1">Property Owner</option>
                        <option @if(old('ownership')==0){{"selected"}}@endif value="0">Property Buyer</option>
                    </select>
                    @if($errors->has('ownership'))
                        <small class="form-text text-danger">{{$errors->first('ownership')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                    @if($errors->has('password'))
                        <small class="form-text text-danger">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" />
                    @if($errors->has('password_confirmation'))
                        <small class="form-text text-danger">{{$errors->first('password_confirmation')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input name="agree" type="checkbox" class="form-check-input" id="agree" />
                            I agree to the terms and condition. <a href="{{route('terms')}}"  class="mx-5 text-right text-capitalize text-primary">see terms terms and condition</a>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block" disabled="disabled" id="registerBtn" type="submit" style="background-color:green;color: white">Sign Up</button>
                </div>
                <a href="#areas" data-toggle="modal" class="already">You already have an account? Login here.</a>
            </form>
        </div>
    </div>
@endsection
