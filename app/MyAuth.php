<?php
/**
 * Created by PhpStorm.
 * User: osamamohsen
 * Date: 10/09/15
 * Time: 07:47 ص
 */

namespace App;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Session;

class MyAuth
{
    public static $user_data=array();


    public  function attemp($data){

       $result= Users::where('email','=',$data['email'])->first();
        if($result) {
//            dd("here");
            \Session::put('user', $result);
//            dd(\Session::get('user'));
            return true;
        }
        return false;
    }


    public static function user(){
//        dd("here");
//        dd(\Session::get('user'));
        if(\Session::get('user'))
            return \Session::get('user');
        return false;

    }


    public static function check(){
//        dd(\Session::get('user'));
        if(\Session::get('user')){
//         dd("here");
            return true;
        }
        return false;
    }


    public static function guest(){
        return MyAuth::user();
    }


    public static function logout(){
//        \Session::flush();
    }



}