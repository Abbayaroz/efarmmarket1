<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 3/5/2019
 * Time: 7:52 PM
 */
?>
@extends ('admin.partials.default')
@section ('adminContent')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                @include('templates.partials.alerts')
                <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">All  users</h3>
                <table class="table table-striped text-capitalize">
                    <tbody>
                    <tr>
                        <th>Full name</th>
                        <th>Phone</th>
                        <th>email</th>

                    </tr>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->fullName($user)}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
