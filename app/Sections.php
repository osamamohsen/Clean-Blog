<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MyAuth;
class Sections extends Model
{
    protected $fillable=['header','body','image','article_id'];

    public  function isAdmin(){
        dd("hrere");
        if(MyAuth::check())
            return true;
        return false;
    }

}
