<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/10/2018
 * Time: 10:17 AM
 */

namespace EfarmMarket\Models;


use Illuminate\Database\Eloquent\Model;

class WalletRechargeTransaction extends Model
{
    protected $table = "wallet_recharge_transaction";
    protected $fillable = [
      'user_id','transaction_id','v_transaction_id','payment_status','amount'
    ];
}