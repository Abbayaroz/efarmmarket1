<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="cart";
    protected $fillable=['user_id','product_id','name','price','qty'];
    public function getAllCart(){
        return Cart::all();
    }
}
