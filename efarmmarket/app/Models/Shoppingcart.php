<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shoppingcart extends Model
{
    protected $table="shoppingcart";
    protected $fillable=['identifier','content','instance',];
    public function shoppingcart(){
        return DB::table($this->table);
    }
    public function showShoppingcart(){
        return $this->shoppingcart()->where('instance',auth('web')->user()->id)->first();
       // dd($this->showShoppingcart());
    }
}
