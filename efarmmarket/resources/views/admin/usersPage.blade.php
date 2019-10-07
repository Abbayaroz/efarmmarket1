<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/16/2018
 * Time: 2:55 AM
 */
?>

@extends ('admin.partials.default')
@section ('adminContent')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                @include('templates.partials.alerts')
                <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">All Unverified users</h3>
                <div style="padding: 5px;background: #0b2e13;width: fit-content">
                    <i class="fa fa-user text-white"></i><a href="{{route('users')}}" class="">All Users</a>
                </div>

                <table class="table table-striped text-capitalize">
                    <tbody>
                    <tr>
                        <th>Full name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Verify</th>
                    </tr>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->fullName($user)}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('verifyUsers',['userId'=>$user->id])}}" class="btn-sm btn-success" type="button" style="">Verify &nbsp;<i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
