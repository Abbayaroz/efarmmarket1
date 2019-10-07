<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminLog extends Model
{
    protected $table="admin_log";
    protected $fillable=['user_id', 'action', 'created_at', 'status','updated_at',
    ];
    protected $hidden=[];
    public function getAllAdminLog(){
        return DB::table($this->table)->paginate(50);
    }
}
