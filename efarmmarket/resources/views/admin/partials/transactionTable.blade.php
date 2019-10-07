<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/22/2018
 * Time: 10:50 AM
 */
?>
@if(session()->has('transactions'))
    <?php $transactions = session()->get('transactions');?>
    @if($transactions->count()>0)
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Username</th>
                <th>Transaction ID</th>
                <th>Vogue Transaction ID</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <?php
                if(!is_null($transaction->paymentStatus)&& is_null($transaction->payment_status)){
                    $payment="paid";
                }
                if(is_null($transaction->paymentStatus)&& is_null($transaction->payment_status)){
                    $payment="not paid";
                }
                if(is_null($transaction->paymentStatus)&& !is_null($transaction->payment_status)){
                    $payment="paid";
                }
                ?>
                <tr>
                    <td>{{\estateManagement\Models\User::find($transaction->user_id)->username}}</td>
                    <td>
                        @if(is_null($transaction->transactionId) )
                            {{$transaction->transaction_id}}
                        @else
                            {{$transaction->transactionId}}
                        @endif
                    </td>
                    <td>
                        @if(!is_null($transaction->v_transaction_id))
                        {{$transaction->v_transaction_id}}
                        @else
                            {{"NIL"}}
                        @endif
                    </td>
                    <td>{{$transaction->amount}}</td>
                    <td>
                        @if(is_null($transaction->paymentStatus)&& is_null($transaction->payment_status))
                            {{$payment}}
                        @elseif(is_null($transaction->paymentStatus)&& !is_null($transaction->payment_status))
                            {{$payment}}
                        @elseif(!is_null($transaction->paymentStatus)&& is_null($transaction->payment_status))
                            {{$payment}}
                        @endif
                    </td>
                    <td>{{\Illuminate\Support\Carbon::parse($transaction->updated_at)->format('d M D, Y h:mm A')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h1 class="text-center text-capitalize text-danger">No Records Found</h1>
    @endif
@endif