<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 9/9/15
 * Time: 9:20 AM
 */

namespace App;


class node {
    public $title,$text,$image,$article_id;

    function getNode($title,$text,$image,$article_id){
        $this->title=$title;
        $this->text=$text;
        $this->$image=$image;
        $this->article_id=$article_id;
    }
    function getNodeNoImage($title,$text,$article_id){
        $this->title=$title;
        $this->text=$text;
        $this->article_id=$article_id;
    }
} 