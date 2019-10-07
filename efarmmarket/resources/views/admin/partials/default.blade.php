<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/15/2018
 * Time: 7:52 AM
 */
?>
<html>
    <head>
        <title>{{$title}}</title>
        @include ('templates.style')
    </head>
    <body>
        @include ('admin.partials.header')
        @yield ('content3')
@if(auth()->guard('admin')->check()&& !in_array(url()->current(),[
route('admin.login'),]));
@include('admin.partials.sidebar')
@endif
@include ('admin.partials.footer')
@include ('templates.script')
</body>
</html>
