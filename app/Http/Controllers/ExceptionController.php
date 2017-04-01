<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExceptionController extends Controller
{
    public function  notfound_404(){
        return view('errors.404');
    }
}
