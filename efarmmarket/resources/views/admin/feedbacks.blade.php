<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/26/2018
 * Time: 10:58 AM
 */
?>
@extends('admin.partials.default')
@section ('adminContent')
    <div class="row">
        <div class="col-10 offset-1">
            @include('templates.partials.alerts')
            <h3 class="text-uppercase text-center mb-3" style="font-weight: bolder;color: rgb(9,48,86)">customers feedbacks</h3>
                <table class="table table-striped table-responsive text-capitalize">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Time to Call</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($feedback->count()>0)
                    <?php $counter=0?>
                        @foreach($feedback as $message)
                    <tr>
                        <td>{{$message->fullname}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->phone}}</td>
                        <td>


                            @if($message->best_time_call==1)
                                <span>Morning</span>

                            @elseif($message->best_time_call==2)
                                <span>afternoon</span>

                            @elseif($message->best_time_call==3)
                                <span>evening</span>
                            @elseif($message->best_time_call==null)
                                <span>no time selected</span>
                            @endif

                        </td>
                        <td>@if(strlen($message->body)>=15)
                                {{substr($message->body,0,15)}}...
                            @else
                                {{$message->body}}
                            @endif
                        </td>
                        <td>
                            <a href="#readmore{{$counter}}" data-toggle="modal" class="btn btn-dark mr-3">More <i class="fa fa-eye"></i> </a>
                            <a href="{{route('read', ['read'=>$message->id])}}" class="btn btn-success" >Read <i class="fa fa-check"></i> </a>
                            <div role="dialog" tabindex="-1" class="modal fade" id="readmore{{$counter}}" style="margin-top:70px;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body" style="background: aliceblue;height: 50%">
                                            <span>{{$message->body}}</span>
                                        </div>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                        <?php $counter++?>
                        @endforeach
                    @else
                        <div class="text-center text-danger">No feedback Yet</div>
                    @endif
                    </tbody>
                </table>
        </div>
    </div>
@endsection
