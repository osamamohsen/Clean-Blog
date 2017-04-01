<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function move_image($imageRequest){
        $imageRequest->move(
            base_path() . '/public/img/', $imageRequest->getClientOriginalName());

    }

    public function image_path($image){
        return "/img/".$image->getClientOriginalName();
    }
}
