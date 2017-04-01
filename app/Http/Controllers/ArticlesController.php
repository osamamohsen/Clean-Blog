<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests\ArticlesRequest;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;
use Symfony\Component\Console\Input\Input;
class ArticlesController extends BaseController
{

    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }

    //get All Articles
    public function index(){
        $articles=Articles::latest('created_at')->published()->get();
        return view('articles.index')->with('articles',$articles);
    }

    //create an new Article
    public function create(){
//        dd("here");
        $tags = \App\Tags::lists('name','id');
        
//        dd($tags);
        return view('articles.create')->with('tags',$tags);
    }

    //making validation for new tags for repeating the same tag
    public function tags_validate($request){
        $tags=array();
        $tagss=$request->input('new_tags');
        foreach($tagss as $key => $tag) $tags['new_tags']=$tag;
        $validator = Validator::make($tags,Tags::$tag_rules);
        if($validator->fails())
            return redirect('/articles/create')->withErrors($validator)->withInput();
        return true;
    }

    //adding an new tags in DB
    public function add_Tags($tags){

        $tags_added=array();
        foreach($tags as $key => $tag){
            $tager = new \App\Tags();
            $tager->name= $tag;
            $tager->save();
            $tags_added [] = $tager->id;
//            \App\Tags::create(['name' => $tag]);
        }
        return $tags_added;
    }

    //Retrieve all tags for specific article calling(add_tags,tags_validate)
    public function get_tags($request){
        $tags=array();
        $tags = $this->add_Tags($request->input('new_tags'));
        if($request->input('tags'))
            foreach($request->input('tags') as $key => $value)
                $tags[]=$value;
        return $tags;
    }

    //store an article and calling (get_tags)
    public function store(Request $request){

        $validator = Validator::make($request->all(),Articles::$article_rules);
        $tags = array();
        if(!$validator->fails()){
            if($request->input('new_tags') && $this->tags_validate($request)){
                $tags=$this->get_tags($request);
            }
            else $tags = $request->input('tags');
            $article = \Auth::user()->articles()->create($request->all());
            $article->tags()->sync($tags);
        }
        else return redirect('/articles/create')->withErrors($validator)->withInput();
        $this->move_image($request->file('image'));
        \Session::flash('flash_message','your article has been created!');
        return redirect('/articles');
    }

    //show specific article Details
    public function show($id)
    {
        try {
//            dd("here");
            $article = Articles::findOrFail($id);
                $sections = \App\Sections::where('article_id', '=', $id)->get();
//            dd($article->body);
                return view('articles.show')->with('article', $article)->with('sections',$sections);
        }
        catch(ModelNotFoundException $x) {
                return redirect('/articles');
        }
    }

    //Destroy an Articles
    public function destroy(Request $request)
    {
        try{
        $article = Articles::findOrFail($request->input('article_id'));
        $article->delete();
        return redirect('/articles');
        }catch (ModelNotFoundException $x){
            return redirect('/articles');
        }
    }
    
}
