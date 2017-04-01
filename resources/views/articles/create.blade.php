@extends('layouts.master')
@section('header') @include('layouts.header_home') @stop
@section('content')
@include('errors.errors')


{!!Form::open(array('action'=>'ArticlesController@store','files'=>'true')) !!}
    <div class="form-group">
        @include('articles.form')
    </div>

{!!Form::close() !!}

@stop
