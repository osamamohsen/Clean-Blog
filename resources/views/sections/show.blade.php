@foreach($sections as $sec)
    <article>
        <div class="container">
            <div class="row">
                @if(\Auth::check())
                <a href="/sections/{!! $sec->id !!}" class="btn btn-danger">Delete</a>
                @endif
                <div style="margin-left: -20px;" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <p class="section-heading">{!! $sec->header !!}</p>
                    @if($sec->image)
                        <img style="width: 100%;" class="img-responsive" src="{!! $sec->image !!}" alt="">
                    @endif
                    <p>{!! $sec->body !!}</p>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endforeach

