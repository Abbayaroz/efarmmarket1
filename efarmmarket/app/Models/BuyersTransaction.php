<?php

namespace EfarmMarket\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BuyersTransaction extends Model
{
    protected $table = "buyertransaction";
    protected $fillable = [
        'user_id','gallery_id','transaction_id','v_transaction_id','payment_status','amount'
    ];
    public function getAllBuyersTransaction(){
        return BuyersTransaction::all();
    }
    public function getDailyReport()
    {
        $report = DB::table($this->table)
            ->where('payment_status',1)
            ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->pluck('created_at');
        return "{label : "."'".Carbon::now()->format('Y-m-d')."'".",
                value : ".$report->count().", type : 'Bought'}";
    }
    public function getWeeklyReport(){
        $weekDay = Carbon::parse(Carbon::now()->format('Y-m-d'))->subWeek(1)->format('Y-m-d');
        $date = DB::table($this->table)
            ->where('payment_status',1)
            ->whereBetween(DB::raw("DATE(created_at)"),[$weekDay,Carbon::now()->format('Y-m-d')])->select(DB::raw('DATE(created_at) as created_at'))->pluck('created_at');
        $date2 = DB::table('gallery')
            ->whereBetween(DB::raw("DATE(created_at)"),[$weekDay,Carbon::now()->format('Y-m-d')])->select(DB::raw('DATE(created_at) as created_at'))->pluck('created_at');
        $string = '';

        $dates=collect($date);
        $dates= $dates->merge($date2)->unique()->toArray();

        foreach ($dates as $date){
            $reports = DB::table($this->table)->where(DB::raw('DATE(created_at)'),$date);
            $reports2 =DB::table('gallery')->where(DB::raw('DATE(created_at)'),$date);
            $string .= "{date : "."'".$date."'".", Advert : ".$reports->count().", Purchase : ".$reports2->count()."},";
        }
        return $string;
    }
    public function getMonthlyReport(){
        $monthBought=DB::table($this->table)
            ->where(DB::raw('MONTH(created_at)'),Carbon::now()->format('m'))
            ->where(DB::raw('YEAR(created_at)'),Carbon::now()->format('Y'));
        $monthAdvert =DB::table('gallery')
            ->where(DB::raw('MONTH(created_at)'),Carbon::now()->format('m'))
            ->where(DB::raw('YEAR(created_at)'),Carbon::now()->format('Y'))
            ->select(DB::raw('DATE(created_at)'));
        $string = '';
        $prevMonth = Carbon::now()->subMonth(1)->format('m');
        $prevMonthBought=DB::table($this->table)
            ->where(DB::raw('MONTH(created_at)'),$prevMonth)
            ->where(DB::raw('YEAR(created_at)'),Carbon::now()->format('Y'));
        $prevMonthAdvert =DB::table('gallery')
            ->where(DB::raw('MONTH(created_at)'),$prevMonth)
            ->where(DB::raw('YEAR(created_at)'),Carbon::now()->format('Y'))
            ->select(DB::raw('DATE(created_at)'));
        $string .= "{date : "."'".Carbon::now()->format('Y-m-d')."'".", Advert : ".$monthAdvert->count().", Purchase : ".$monthBought->count()."},";
        $string .= "{date : "."'".Carbon::now()->subMonth(1)->format('Y-m-d')."'".", Advert : ".$prevMonthAdvert->count().", Purchase : ".$prevMonthBought->count()."},";

        return $string;


    }
    public function getYearlyReport(){
        $string = '';
        for($i=1;$i<=12;$i++){
            if(strlen($i)==1){
                $conv = "0".$i;
            }else{
                $conv =$i;
            }
            $date = DB::table($this->table)
                ->where(DB::raw("YEAR(created_at)"),Carbon::now()->format('Y'))
                ->where(DB::raw("MONTH(created_at)"),$conv)
                ->where('payment_status',1)
                ->select(DB::raw('DATE(created_at) as created_at'));
            $date2 = DB::table('gallery')
                ->where(DB::raw("YEAR(created_at)"),Carbon::now()->format('Y'))
                ->where('paymentStatus',1)
                ->where(DB::raw("MONTH(created_at)"),$conv)
                ->select(DB::raw('DATE(created_at) as created_at'));
            $string .= "{date : "."'".date('Y')."-".$conv."'".", Advert : ".$date2->count().", Purchase : ".$date->count()."},";
        }
        return $string;
    }
    public function getMyBoughtProperties($propertiesArray,$requestedProperties){
        return $this->getAllBuyersTransaction()->whereIn('gallery_id',$propertiesArray)->whereNotIn('id',$requestedProperties);
    }
}
