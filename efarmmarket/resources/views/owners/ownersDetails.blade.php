<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 12/1/2018
 * Time: 12:54 PM
 */
?>
@extends('templates.default')
@section('content2')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr></tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Full name</td>
                        <td>{{$owner->fullName($owner)}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$owner->phone}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$owner->email}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$property->address}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
