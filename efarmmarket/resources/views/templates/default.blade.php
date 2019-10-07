<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 11:44 AM
 */
?>
<html>
    <head>
        <title>{{$title}}</title>
        <link rel="shortcut icon" type="img/png" href="{{url('assets/img/a.png')}}">
        @include ('templates.style')
    </head>
    <body>
    @include('templates.partials.header')
    @yield ('content')
    @if(auth()->guard('web')->check()&& !in_array(url()->current(),[
    route('homepage'),
    route('contact.info'),
    route('aboutUs'),
    route('services'),
    route('privacyPolicy')
    ]))
    @include ('templates.partials.sidebar')
    @endif
    @include('templates.partials.footer')
    @include ('templates.script')

    </body>
</html>
