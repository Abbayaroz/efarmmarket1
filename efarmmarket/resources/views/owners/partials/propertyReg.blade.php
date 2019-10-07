<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/30/2018
 * Time: 1:27 PM
 */
?>
<h3 class="text-uppercase text-center" style="font-weight: bolder">Upload Property</h3>
<div class="row">
    <div class="col-lg-8 offset-lg-2 p-4 " style="box-shadow: -1px 2px 6px 5px">
        @include('templates.partials.alerts')
        <form method="post" action="{{route('owner.property.upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="putContent">
                <div class="form-group">
                    <div class="input-group my-2" id="rem1">
                        <div class="input-group-prepend"><span class="input-group-text">property images &nbsp;<i class="fa fa-file-image-o"></i></span></div>
                        <input type="file" class="form-control" name="propertyPicture[]" />
                        <div class="input-group-append">
                            <button type="button" class="btn  add ml-2 p-0" style="border-radius: 40%;background: rgb(9,45,89);color: white">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button></div>
                    </div>
                    @if($errors->has('propertyPicture.*'))
                        <small class="text-danger form-text">{{$errors->first('propertyPicture.*')}}</small>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Name" class="form-control" />
                </div>
                @if($errors->has('name'))
                    <small class="text-danger form-text">{{$errors->first('name')}}</small>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="quantity" value="{{old('quantity')}}" placeholder="Quantity" class="form-control" />
                </div>
                @if($errors->has('quantity'))
                    <small class="text-danger form-text">{{$errors->first('quantity')}}</small>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="price" value="{{old('price')}}" placeholder="Price" class="form-control" />
                </div>
                @if($errors->has('price'))
                    <small class="text-danger form-text">{{$errors->first('price')}}</small>
                @endif
            </div>
            <div class="form-group">
                <textarea name="description" placeholder="Description" class="form-control">{{old('description')}}</textarea>
                @if($errors->has('description'))
                    <small class="text-danger form-text">{{$errors->first('description')}}</small>
                @endif
            </div>
            <div class="form-group">
                <button class="btn text-capitalize" type="submit" style="background:green;color: white">Upload Item</button>
            </div>
        </form>
    </div>
</div>