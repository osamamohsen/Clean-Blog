<header class="intro-header" style="background-image: url('{!! $article->image !!}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" >
                <div class="post-heading" >
                    <h1 style="background: hsla(0, 1%, 33%, 0.75);">{!! $article->header !!}</h1>

                    {{--<span class="meta" style="background: hsla(0, 1%, 33%, 0.75);">Posted by {!!$article->user_id !!} on--}}
                        {{--{!! $article->published_at !!}</span>--}}
                </div>
            </div>
        </div>
    </div>
</header>