<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/22/2018
 * Time: 11:16 PM
 */
?>
@extends ('admin.partials.default')
    @section ('adminContent')
        @include ('templates.partials.alerts')
        <div class="row mt-2">
            <div class="col pl-5 pr-5">
                <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Contact information</h3>
                <form method="post" action="{{route('contact.us')}}" style="padding:5%;box-shadow:-1px 3px 4px 3px">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" placeholder="Contact Information" class="form-control"></textarea>
                    @if($errors->has('body'))
                        <small class="text-danger form-text">{{$errors->first('body')}}</small>
                    @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type">
                            <option value="1" selected>Email</option>
                            <option value="2">phone</option>
                            <option value="3">address</option>
                        </select>
                        @if($errors->has('type'))
                            <small class="text-danger form-text">{{$errors->first('type')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

