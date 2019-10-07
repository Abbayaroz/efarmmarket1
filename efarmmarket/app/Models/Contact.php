<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    protected $table="contact";
    protected $fillable=['type','body'];
    protected $hidden="";
    public function contactInfo(){
        return DB::table($this->table);
    }
    public function email(){
        return $this->contactInfo()->where('type',1)->first();
    }
    public function phone(){
        return $this->contactInfo()->where('type',2)->first();
    }
    public function address(){
        return $this->contactInfo()->where('type',3)->first();
    }

}
