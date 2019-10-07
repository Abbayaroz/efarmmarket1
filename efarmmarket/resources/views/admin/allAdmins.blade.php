<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 12/7/2018
 * Time: 8:54 PM
 */
?>

@extends('admin.partials.default')
@section('adminContent')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                @include('templates.partials.alerts')
                <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">All Administrators</h3>
                <table class="table table-striped text-capitalize">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Privilege</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter=0 ?>
                        @foreach($admins as $admin)
                            <?php
                                if($admin->previlage==1){
                                    $privilege="super-admin";
                                }
                            if($admin->previlage==0){
                                $privilege="ordinary admin";
                            }
                            ?>
                            @if($admin->id !=1)
                        <tr>
                            <td>{{$admin->fullName($admin)}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->phone}}</td>
                            <td>{{$admin->email}}</td>
                            <td class="text-center">{{$privilege}}</td>
                            @if(auth()->guard('admin')->user()->id==1)
                            @if($admin->id !=1)
                                <td><a href="#modal{{$counter}}" data-toggle="modal" class="btn btn-danger text-capitalize" type="button">Remove admin</a></td>
                                <td><a href="{{route('updateAdmin',['update'=>$admin->id])}}" class="btn btn-success text-capitalize" type="button">Change privilege</a></td>
                            @endif
                            @endif
                        </tr>
                            @endif
                            <div role="dialog" tabindex="-1" class="modal fade" id="modal{{$counter}}" style="width:400px;height:250px;overflow:hidden;margin:50px auto;text-transform:capitalize;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content alert alert-warning" role="alert" >
                                        <div class="modal-header p-0">
                                            <strong class="text-capitalize text-center"><i class="fa fa-warning"></i> Warning!!</strong><br>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <span>do you really want to remove this admin?.</span>
                                        </div>
                                        <div class="modal-footer p-0">
                                            <button class="btn btn-light p-1" type="button" data-dismiss="modal" style="font-size: 14px">Cancel</button>
                                            <a href="{{route('delete',['delete'=>$admin->id])}}" class="btn btn-light text-danger p-1"  style="font-size: 14px">Delete</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++ ?>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
