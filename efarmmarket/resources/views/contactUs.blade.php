<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/31/2018
 * Time: 4:04 AM
 */
?>
@extends ('templates.default')
@section ('content')
    <div class="row px-5" >
        <div class="col-lg-12 offset-lg-0 mb-3 p-3 mt-4">
            @include('templates.partials.alerts')
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h2 class="mb-1 text-center" style="color: rgb(9,48,86);" >Contact Us</h2>
                    <form method="post" action="{{route('user.contact')}}" style="box-shadow: -1px 1px 1px 1px;padding: 10px">
                     @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="fullname" placeholder="Fullname" />
                            </div>
                            @if($errors->has('fullname'))
                                <small class="form-text text-danger">{{$errors->first('fullname')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="Email" />
                            </div>
                            @if($errors->has('email'))
                                <small class="form-text text-danger">{{$errors->first('email')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" />
                            </div>
                            @if($errors->has('phone'))
                                <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <select name="best_time_call" class="form-control">
                                        <option value=" " selected >Best Time to Contact</option>>
                                            <option value="1">Morning</option>
                                            <option value="2">Afternoon</option>
                                            <option value="3">Evening</option>
                                    </select>
                                    @if($errors->has('best_time_call'))
                                        <small class="form-text text-danger">{{$errors->first('best_time_call')}}</small>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group">
                            <textarea placeholder="Message" name="body" class="form-control"></textarea>
                            @if($errors->has('body'))
                                <small class="form-text text-danger">{{$errors->first('body')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                                <button class="btn" type="reset" style="background: rgb(9,48,86);color: white" >Refresh</button>
                                <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col" >
                    <div class="row">
                        <div class="col" style="overflow-x: hidden;">
                            <h2 class="" style="color: rgb(9,48,86);">Our Location</h2>
                            @include ('googleMap')
                        </div>
                    </div>
                    <div class="row" style="box-shadow: -1px -4px 3px 2px;">
                        <div class="col">
                            <h3 class="" style="color: rgb(9,48,86);"><u>Our Info</u></h3>
                            <span><i class="fa fa-envelope" style="color: rgb(9,48,86);"></i> &nbsp;{{$email->body}}</span>
                            <span><i class="fa fa-phone fa-2x" style="color:green"></i> &nbsp;{{$phone->body}}</span>
                        </div>
                        <div class="col">

                            <h3 class="" style="color: rgb(9,48,86);"><u>Address</u></h3><span>{{$address->body}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
