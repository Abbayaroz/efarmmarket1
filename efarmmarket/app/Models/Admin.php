<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 1:17 PM
 */

namespace EfarmMarket\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Database\Eloquent\Model;
class Admin extends  Model implements AuthenticatableContracts
{
use Authenticatable;
    protected $fillable=['username', 'firstName', 'lastName', 'phone', 'email', 'previlage', 'password','profilePicture',];
    protected $table="add_admin";
    protected $hidden=['password','remember_token'];
    public function getAllAdmins(){
        return Admin::all();
    }
    public function fullName($admin){
        return $admin->firstName." ".$admin->lastName;
    }
}