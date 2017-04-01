@extends('layouts/master')
@section('header') @include('layouts.header_view') @stop
{{--asdasda--}}
@section('content')
        {!! $article->body!!}
        @include('sections.create')

@stop