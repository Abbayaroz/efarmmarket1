<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/5/2018
 * Time: 4:56 AM
 */
?>
@extends ('templates.default')
@if(!auth()->guest())
@section ('content2')
@include('general.partials.readMore')
@endsection
@else

        @section ('content')
            @include('general.partials.readMore')
        @endsection

@endif
