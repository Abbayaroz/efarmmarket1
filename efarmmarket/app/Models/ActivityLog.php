<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityLog extends Model
{
    protected $table="activity_log";
    protected $fillable=['user_id','status', 'action', 'created_at', 'updated_at',
    ];
    protected $hidden=[];
    public function getAllActivitiesLog(){
            return DB::table($this->table)->paginate(50);
        }
    public function fullName($user){
        return $user->firstName." ".$user->lastName;
    }
}
