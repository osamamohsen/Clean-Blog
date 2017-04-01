<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class TagsController extends Controller
{
    public function show($id){
//        dd($id);
        $articles=array();
        $articles_id = DB::table('articles_tags')->where('tags_id','=',$id)->get();
//        dd($articles_id);
        foreach($articles_id as $art){
            try{
                $articles[] = \App\Articles::findOrFail($art->articles_id);
            }catch (ModelNotFoundException $ex){
                return redirect('/articles');
            }
        }
        return view('articles.index')->with('articles',$articles);
    }
}
