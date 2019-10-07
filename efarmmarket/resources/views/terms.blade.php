<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 2/19/2019
 * Time: 2:31 AM
 */
?>
@extends ('templates.default')
@section ('content')

    <h3 class="text-uppercase text-center " style="font-weight: bolder">About Syi estate</h3>
    <div class="row my-4">
        <div class="col" style="text-align: justify;padding:0px 10%;">
            {!! $terms->body !!}
        </div>
    </div>
@endsection
