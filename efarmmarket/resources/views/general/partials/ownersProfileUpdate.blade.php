<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/2/2018
 * Time: 3:13 AM
 */
?>
<div class="register-photo" style="background: white">
    <h3 class="text-uppercase text-center " style="font-weight: bolder">Update Profile</h3>
    @include ('templates.partials.alerts')
    <div class="form-container">
        <form method="post" action="{{route('owner.profile.update')}}" enctype="multipart/form-data" style="box-shadow: -1px 3px 3px 4px">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="username" value="{{auth()->guard('web')->user()->username}}" class="form-control" style="margin-bottom:10px;" readonly/>
                @if($errors->has('username'))
                    <small class="form-text text-danger">{{$errors->first('username')}}</small>
                @endif
                <input type="email" name="email" value="{{auth()->guard('web')->user()->email}}" class="form-control" readonly/>
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
                <button class="btn btn-block" type="submit" style="color:white;background:darkgreen">Update</button>
            </div>
        </form>
    </div>
</div>

