<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['header','sub_header','body','image','user_id','published_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function user_data(array $id){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tags');
    }

    public function setImageAttribute($image){
        $this->attributes['image']="/img/".$image->getClientOriginalName();
    }

    public function ScopePublished($query){
//        echo "er";
         $query->where('published_at','<=',Carbon::now());
    }

    public static $tag_rules = [
        'new_tags' =>'unique:tags'
    ];

    public static $article_rules = [
        'header'     => 'required|min:3',
        'sub_header' => 'required|min:3',
        'body'       => 'required|min:20',
        'image'      => 'required',
        'user_id'    => 'required',
        'published_at' => 'required|date|date_format:Y-n-j'
    ];
}
