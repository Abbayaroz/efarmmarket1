<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/10/2018
 * Time: 10:08 AM
 */

namespace EfarmMarket\Models;


use Illuminate\Database\Eloquent\Model;

class Wallet extends  Model
{
    protected $table="wallet";
    protected $fillable=[
        'user_id','amount',
    ];

}