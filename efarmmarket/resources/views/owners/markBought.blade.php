<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/20/2018
 * Time: 8:22 AM
 */
?>
@extends ('templates.default')
@section ('content2')
    @include ('templates.partials.alerts')
    <?php $boughts = $Property->successBuyersTransaction();?>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Verify</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($boughts->get() as $bought)
                    <form action="{{route('verify.bought',['propertyId'=>$Property->id])}}" method="post">
                        @csrf
                        <tr>
                            <?php $user = \EfarmMarket\Models\User::find($bought->user_id)?>
                            <td><span>{{$user->firstName." ".$user->lastName}}</span></td>
                            <td>
                                <button class="btn btn-primary" type="submit" name="user" value="{{$user->id}}" style="background-color:rgb(17,102,20);">
                                    <i class="fa fa-check"></i> verify
                                </button>
                            </td>
                         </tr>
                    </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
