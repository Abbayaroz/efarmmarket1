<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="shipping-info";
    protected $fillable=['address','state','city','user_id','transaction_id'];
}
