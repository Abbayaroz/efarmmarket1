<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/22/2018
 * Time: 8:46 AM
 */

namespace EfarmMarket\Http\Controllers\Admin;


use EfarmMarket\Http\Controllers\Controller;
use EfarmMarket\Models\AdminLog;
use EfarmMarket\Models\BankDetails;
use EfarmMarket\Models\BuyersTransaction;
use EfarmMarket\Models\Charge;
use EfarmMarket\Models\gallery;
use EfarmMarket\Models\User;
use EfarmMarket\Models\Wallet;
use EfarmMarket\Models\WalletRechargeTransaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $merchantId ="DEMO";
    private $notifyUrl;
    private $failedUrl;
    private $successUrl;
    private $developerCode;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->notifyUrl =route('payment.notify');
        $this->successUrl = route('payment.success');
        $this->failedUrl =route('payment.failed');
    }
    public function requery(Request $request,Charge $charge){
        $merchant_id = $this->merchantId;
        //get the full transaction details as an json from voguepay
        $json = file_get_contents('https://voguepay.com/?v_transaction_id='.$request->input('transaction').'&type=json&demo=true');
        //create new array to store our transaction detail
        $transaction = json_decode($json, true);
        $mRef= $transaction['merchant_ref'];
        $char = trim(strtoupper(substr($mRef,0,1)));
        if($transaction['status'] == 'Approved'){
            if (strtoupper($transaction['merchant_id']) == strtoupper($merchant_id)) {
                if($char=='W'){
                    $walletObj = WalletRechargeTransaction::where('transaction_id',$mRef)->first();
                    if($walletObj->payment_status !==1) {
                        $walletObj->update(['payment_status' => 1,'amount' => $transaction['total'],'v_transaction_id' => $transaction['transaction_id']]);

                        $userWallet = Wallet::where('user_id', $walletObj->user_id)->first();
                        $prevAmount = $userWallet->amount;
                        $currentAmount = $prevAmount + trim($transaction['total']);
                        $userWallet->update(['amount' => $currentAmount]);
                        AdminLog::create([
                            'user_id'=>\auth('admin')->user()->id,
                            'action'=>"Requeried Wallet Recharge Transaction"]);
                    }
                }elseif ($char=='O'){
                    $galleryObj = gallery::where('transactionId', $mRef)->first();
                    if($charge->ownerCharge()->first()->amount == trim($transaction['total'])) {
                        $galleryObj->update([
                            'v_transaction_id' => $transaction['transaction_id'],
                            'paymentStatus' => 1,
                        ]);
                        AdminLog::create([
                            'user_id'=>\auth('admin')->user()->id,
                            'action'=>"requery advert transaction"]);
                    }else{
                        $galleryObj->update([
                            'v_transaction_id' => $transaction['transaction_id'],
                            'paymentStatus' => 3,
                        ]);
                        AdminLog::create([
                            'user_id'=>\auth('admin')->user()->id,
                            'action'=>"updated payment status"]);
                    }
                }elseif ($char=='B'){
                    $buyersTranObj=BuyersTransaction::where('transaction_id',$mRef)->first();
                    if($charge->buyerCharge()->first()->amount == trim($transaction['total'])) {
                        $buyersTranObj->update([
                            'v_transaction_id' => $transaction['transaction_id'],
                            'payment_status' => 1,
                        ]);
                        AdminLog::create([
                            'user_id'=>\auth('admin')->user()->id,
                            'action'=>"requery property access transaction"]);
                    }else{
                        $buyersTranObj->update([
                            'v_transaction_id' => $transaction['transaction_id'],
                            'payment_status' => 3,
                        ]);
                        AdminLog::create([
                            'user_id'=>\auth('admin')->user()->id,
                            'action'=>"updates payment status for property access"]);
                    }
                }
                AdminLog::create([
                    'user_id'=>\auth('admin')->user()->id,
                    'action'=>"requery wallet transaction"]);
            } else {
                if($char=='W') {
                    $walletObj = WalletRechargeTransaction::where('transaction_id',$mRef)->first();
                    $walletObj->update(['payment_status'
                    => 2, 'amount'
                    => $transaction['total'], 'v_transaction_id'
                    => $transaction['transaction_id']]);
                }elseif($char=='O'){
                    $galleryObj=gallery::where('transactionId',$mRef)->first();
                    $galleryObj->update([
                        'v_transaction_id'=>$transaction['transaction_id'],
                        'paymentStatus'=>2,
                    ]);
                }elseif ($char=='B'){
                    $buyersTranObj=BuyersTransaction::where('transaction_id',$mRef)->first();
                    $buyersTranObj->update([
                        'v_transaction_id'=>$transaction['transaction_id'],
                        'payment_status'=>2,
                    ]);
                    AdminLog::create([
                        'user_id'=>\auth('admin')->user()->id,
                        'action'=>"requery for property access transaction"]);
                }
            }
        }
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"requery transactions",]);
        return redirect()->back()->with('transaction',$transaction);
    }
    public function bTran(Request $request){
        $this->validate($request,[
           'bUsername'=>'required|present|exists:users,username',
        ]);
        $user=User::where('username',$request->bUsername)->first();
            $buyerTran = $user->myBoughtProperties();
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"requery for property access",]);
            return redirect()
                ->back()
                ->with('transactions',$buyerTran->get())
                ->with('tab',3);
    }
    public function advertTran(Request $request){
        $this->validate($request,[
            'advertUsername'=>'required|present|exists:users,username',
        ]);
        $user=User::where('username',$request->advertUsername)->first();
        $advertTran = $user->myPaidProperties()->latest();
        AdminLog::create([
            'user_id'=>\auth('admin')->user()->id,
            'action'=>"requery advert transaction",]);

        return redirect()
            ->back()
            ->with('transactions',$advertTran->get())
            ->with('tab',4);
    }

}