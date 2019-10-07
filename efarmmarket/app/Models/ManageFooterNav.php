<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ManageFooterNav extends Model
{
    protected $table="manage_footer";
    protected $fillable=['body','category'];

    public function showAbout(){
        return ManageFooterNav::all();
    }
}
