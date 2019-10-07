<?php

namespace EfarmMarket\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table="contact_us";
    protected $fillable = [
        'fullname','email','phone','best_time_call','body','attended_status',
    ];
    protected $hidden =[];
    public function getAllFeedback(){
        return ContactUs::all();
    }
    public function getUnreadMessages(){
        return $this->getAllFeedback()
        ->where('attended_status',null);
    }
}
