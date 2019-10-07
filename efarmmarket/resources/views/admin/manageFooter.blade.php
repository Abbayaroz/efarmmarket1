<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 2/19/2019
 * Time: 7:24 AM
 */
?>
@extends ('admin.partials.default')
@section('adminContent')
    <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Manage Footer Navigation</h3>
    <div class="row">
        <div class="col">
            @include('templates.partials.alerts')
            <form method="post" action="{{route('admin.footer')}}">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="mytextarea"  placeholder="Body" class="form-control form-control-lg" rows="7">{{old('body')}}</textarea>
                    @if($errors->has('body'))
                        <small class="text-danger form-text">{{$errors->first('body')}}</small>
                    @endif
                </div>
                <div class="form-group1">
                    <select class="form-control" name="category">
                            <option value=" " selected>Select Category</option>
                            <option value="1">About</option>
                            <option value="2">Services</option>
                            <option value="3">Terms/Condition</option>
                            <option value="4">Privacy/Policy</option>
                    </select>
                    @if($errors->has('category'))
                        <small class="text-danger form-text">{{$errors->first('category')}}</small>
                    @endif
                </div>
                <div class="form-group text-right mt-2">
                    <button class="btn  btn-dark" type="submit">update</button>
                </div>
            </form>
        </div>
    </div>
@endsection