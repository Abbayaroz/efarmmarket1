<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 4:03 PM
 */

namespace EfarmMarket\Http\Controllers;


class GeneralController extends Controller
{
    public static function error_success($heading,$body){
        return array("heading"=>"$heading","body"=>"$body");
    }
    public  static function UploadFile($file,$type,$place){
                $rand = rand(1, 999999999).rand(1000,9999);
                if ($file->move("assets/uploads/$place", $rand . "." . $file->getClientOriginalExtension())) {
                    return $rand . "." . $file->getClientOriginalExtension();

                }else{
                    return false;
                }

            }

}



