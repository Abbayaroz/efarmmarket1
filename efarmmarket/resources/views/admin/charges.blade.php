<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 12/5/2018
 * Time: 1:21 AM
 */
?>
@extends ('admin.partials.default')
@section('adminContent')
    <div class="row">
        <div class="col">
            <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">manage charges</h3>
            @include('templates.partials.alerts')
            <form method="post" action="{{route('charges')}}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Amount &nbsp;<i class="fa fa-money" style="color:saddlebrown"></i></span>
                        </div>
                        <input type="text" class="form-control" name="amount" />
                    </div>
                    @if($errors->has('amount'))
                        <small class="text-danger form-text">{{$errors->first('amount')}}</small>
                     @endif
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success " type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection