<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/27/2018
 * Time: 2:42 PM
 */
?>
@extends ('admin.partials.default')
@section('adminContent')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">Users Activity Logs</h3>
                <table class="table table-striped table-bordered text-capitalize">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>User_id</th>
                        <th>Action</th>
                        <th>Date/Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter =1;?>
                    @foreach($activityLog as $userActivity)
                     <?php
                     $user= \EfarmMarket\Models\User::find($userActivity->user_id)
                     ?>

                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$user->fullName($user)}}</td>
                        <td>{{$userActivity->action}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($userActivity->created_at)->format('d M D, Y h:mm A')}}</td>
                    </tr>
                     <?php $counter++ ?>
                    @endforeach

                    </tbody>
                </table>
                <span>{{$activityLog->links()}}</span>
            </div>
        </div>
    </div>
    @endsection
