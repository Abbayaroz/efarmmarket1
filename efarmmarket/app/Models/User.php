<?php

namespace EfarmMarket\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContracts
{
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'username', 'firstName', 'lastName', 'phone', 'email', 'customerType', 'verified','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAllUsers(){
        return User::all();
    }
    public function getAllUnVerifiedSellers(){
        return $this->getAllUsers()
            ->where('verified',null)
            ->where('customerType',1);
    }
    public function users(){
        return $this->getAllUsers();
    }
    public function getAllProperties(){
        return DB::table($this->table);
    }
    public function fullName($user){
        return $user->firstName." ".$user->lastName;
    }
    public function myProperties(){
        return $this->hasMany(gallery::class,'user_id','id');
    }
    public function myPaidProperties(){
        return $this->myProperties()->where('paymentStatus','=',1);
    }
    public function myRequestedOnFiveBuying(){
        return $this->hasMany(RequestOnfiveBuying::class,'user_id','id');
    }
    public function hasBeenRequested($id){
        return (bool) $this->myRequestedOnFiveBuying()->where('bought_id',$id)->count();
    }
    public function myUnPaidProperties(){
        return $this->myProperties()->where('paymentStatus',null)
            ->orWhere('paymentStatus',2);
    }
    public function mySoldProperties(){
        return $this->myProperties()->where('bought',1);
    }
    public function getFullName(){
        return auth()->guard('web')->user()->firstName." ".auth()->guard('web')->user()->lastName;
    }
    public function myWallet(){
        return $this->hasOne(Wallet::class,'user_id','id');
    }
    public function walletTransaction(){
        return $this->hasMany(WalletRechargeTransaction::class,'user_id','id');
    }
    public function bankDetails(){
    return $this->hasOne(BankDetails::class,'user_id','id');
    }
    public function myBoughtProperties(){
        return $this->hasMany(BuyersTransaction::class,'user_id','id');
    }
    public function myPaidBoughtProperties(){
        return $this->myBoughtProperties()->where('payment_status','=',1);
    }
    public function findPaidProperties($propertyId){
        return $this->myPaidBoughtProperties()->where('gallery_id',$propertyId);
    }
    public function IboughtProperty($propertyId){
        return (bool) $this->myPaidBoughtProperties()->where('gallery_id',$propertyId)->count();
    }
    public function myAcknowledgedBoughtProperties(){
        return gallery::where('bought_by',auth()->guard('web')->user()->id);
    }
    public function userCat(){
        return $this->hasMany(Cart::class,'user_id','id');
    }

}

