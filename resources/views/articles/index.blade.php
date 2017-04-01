@extends('layouts/master')
@section('header') @include('layouts.header_home') @stop
@section('content')

    @foreach($articles as $article)
        @if(Auth::check())
        {!! Form::model($article , array('route'=>'articles.destroy',$article->id,'method'=>'Delete')) !!}
            {!! Form::hidden('article_id',$article->id) !!}
            {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}
        {!! Form::close() !!}
        @endif
        <table><tr>
                <td >
                    <div>
                        <img src="{!! $article['image'] !!}" style="float: left; margin-right: 20px; width: 250px;" class="image" alt=""/>
                    </div>
                </td>

                <td>
        <div class="post-preview">

        <a href="/articles/{!! $article['id'] !!}">
            <h2 class="post-title">
                {!! $article['header'] !!}
            </h2>
            <h3 class="post-subtitle">
                {!! $article['sub_header'] !!}
            </h3>
        </a>
        <p class="post-meta">Posted by <span class="badge">{!! $article->user()->lists('name')[0] !!}</span> on {!! $article['published_at'] !!}</p>
        @if(Auth::check())
            <h3>
                <a class="badge btn-block" href="/sections/create/{!! $article['id'] !!}">Add Sections</a>
            </h3>
        @endif
            @if($article->tags()->lists('name'))
                @for($i=0;$i<count($article->tags()->lists('name')); $i++)
                    <span class="badge" ><a href="/tags/{!! $article->tags()->lists('id')[$i] !!}" style="color: #ffffff;">
                    {!! $article->tags()->lists('name')[$i] !!}</a></span>
                @endfor
            @endif
        </div>
    </td></tr></table>
    @endforeach
@stop