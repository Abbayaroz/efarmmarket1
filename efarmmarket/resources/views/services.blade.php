<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/31/2018
 * Time: 4:06 AM
 */
?>
@extends ('templates.default')
@section ('content')
    <h3 class="text-uppercase text-center " style="font-weight: bolder">About Syi estate</h3>
    <div class="row my-4">
        <div class="col" style="text-align: justify;padding:0px 10%;">
            {!! $services->body !!}
        </div>
    </div>
@endsection

