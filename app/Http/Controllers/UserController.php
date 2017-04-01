<?php

namespace App\Http\Controllers;
use App\MyAuth;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['indexlogin','login','indexRegister','store']]);

    }

    public function indexlogin(){
        return view('user.login');
    }

    public function indexRegister(){
//        dd("indexRegister");
        return view('user.register');
    }

    public function login(Request $request ){
//        dd($request->all());
        $validator = Validator::make($request->all(),User::$rulesLogin);
        if(!$validator->fails()){
            if(\Auth::attempt(array(
                'email' => $request->input('email'),
                'password' =>  $request->input('password')),
                false
            )){
                \Session::flash('flash_message','Welcome '.\Auth::user()->name);
                return Redirect::to('/articles');
            }
            \Session::flash('flash_message','your Email or Password had been Error');
        }
        return redirect('/login')->withInput($request->all)->withErrors($validator);
    }

    public function store(Request $request){
//        dd('store');
        $validation = Validator::make($request->all(),User::$rulesRegister);
        if(!$validation->fails()){
            $user = new user();
            $user ->name = $request->input('name');
            $user ->email = $request->input('email');
            $user ->password = $request->input('password');
            $user->save();
            \Session::flash('flash_message','User had Been Created');
            return Redirect::to('/articles');
        }
        return Redirect::to('/register')->withInput()->withErrors($validation);
//        dd($request->all());
    }

    public function logout(){
        \Auth::logout();
        return Redirect::to('/articles');
    }

}
