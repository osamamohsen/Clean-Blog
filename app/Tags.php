<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['name'];

    public function article(){
        return $this->hasMany('App\Articles');
    }

    public static $tag_rules = [
        'new_tags' => 'unique:tags,name'
    ];
}
