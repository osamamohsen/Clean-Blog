<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\node;
use App\Sections;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
class SectionsController extends BaseController
{
    //construct for middelware
    public function __construct(){
        $this->middleware('auth');
    }

    //get all Data of specific Articles with section Details
    public function create($id){
        try{
            $article= \App\Articles::findOrFail($id);
            $sections=Sections::where('article_id','=',$article->id)->get();
            return view('articles.show',compact('article'),compact('sections'));
        }catch (ModelNotFoundException $x){
            return redirect('/articles');
        }
    }

    //store section for specific article
    public function storeSection($title,$text,$image,$article_id){
        $section = new Sections();
        $section->header=$title;
        $section->body=$text;
        $section->article_id=$article_id;
        if($image!=null){  $section->image=$this->image_path($image);  $this->move_image($image);   }
        $section->save();
    }

    //build validation
    public function buildVaildation($request){
        //st , sb , file

        $rules=array();
        foreach($request->all() as $key => $value){
            if(substr($key,0,4) != "file")
                $rules[$key]='required';
            else
                $rules[$key]='image';
        }
        return $rules;
    }

    //store all sections for specific article
    public function store(Request $request){
        //st , sb , file
        $counter    = $request->input('count');
        $article_id = $request->input('articel_id');
        $rules = $this->buildVaildation($request);
        $validator = Validator::make($request->all(),$rules);
        if(!$validator->fails()){
            for($i=0;$i<=$counter;$i++){
                if($request->input('st'.$i) && $request->input('sb'.$i))
                {
                    if($request->file('file'.$i)){
//                        dd("here");
                        $this->storeSection($request->get('st'.$i),$request->get('sb'.$i),$request->file('file'.$i),$article_id);
                    }else{
                        $this->storeSection($request->get('st'.$i),$request->get('sb'.$i),null,$article_id);
                    }
                }
            }//end all input
        }else{
            \Session::flash('flash_message','your Section has been Error!');
            return redirect('/sections/create/'.$article_id)->withErrors($validator)
                ->withInput($request->all());
        }
        \Session::flash('flash_message','your Section has been successfully created!');
        return redirect('/sections/create/'.$article_id);
    }

    //destroy specific section
    public function delete($id){
        try {
            $sec = Sections::findOrFail($id);
            $article = $sec->article_id;
            $sec->delete();
            Session::flash('flash_message', 'your Section had been Deleted!');
            return redirect('/sections/create/' . $article);
        } catch (ModelNotFoundException $x){
                return redirect('/articles');
        }
    }
}
