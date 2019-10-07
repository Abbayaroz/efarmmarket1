<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/2/2018
 * Time: 3:11 PM
 */

namespace EfarmMarket\Models;


use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Support\Facades\DB;

class gallery extends Model implements AuthenticatableContracts
{
    use Authenticatable;
    protected $table="gallery";
    protected $fillable = ['user_id','amount','bought_by','qty', 'description','name', 'price', 'paymentStatus','transactionId','v_transaction_id','bought'
    ];
    protected $hidden=[];
    public function getAllProperties(){
        return DB::table($this->table);
    }
    public function getDailyReport()
    {
        $report = DB::table($this->table)
            ->where('paymentStatus',1)
            ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->pluck('created_at');
            return "{label : "."'".Carbon::now()->format('Y-m-d')."'".",
                value : ".$report->count().", type : 'Advert'}";

    }
    public function getWeeklyReport(){
        $weekDay = Carbon::parse(Carbon::now()->format('Y-m-d'))->subWeek(1)->format('Y-m-d');
        $date = DB::table($this->table)
            ->where('paymentStatus',1)
            ->whereBetween(DB::raw("DATE(created_at)"),[$weekDay,Carbon::now()
            ->format('Y-m-d')])->select(DB::raw('DATE(created_at) as created_at'))
            ->pluck('created_at');
        $string = '';
        $dates=collect($date)->unique()->toArray();
        foreach ($dates as $date){
            $reports = DB::table($this->table)
            ->where(DB::raw('DATE(created_at)'),$date);
            $string .= "{date : "."'".$date."'".", total : ".$reports->count().", type : 'Advert'},";
        }
        return $string;
    }
    public function unBoughtProperties(){
        return $this->getAllProperties()
        ->where('paymentStatus',1)
        ->where('bought',0);
    }
    public function sliderImage(){
        return $this->unBoughtProperties()
        ->inRandomOrder()->latest()->limit(10);
    }
    public function propertyImages(){
        return $this->hasMany(PicturesGallery::class,'gallery_id','id');
    }
    public function buyerForProperty(){
        return $this->hasMany(BuyersTransaction::class,'gallery_id','id');
    }
    public function successBuyersTransaction(){
        return $this->buyerForProperty()->where('payment_status', 1);
    }
}