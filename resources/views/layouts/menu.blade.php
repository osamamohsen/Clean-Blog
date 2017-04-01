
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/articles">
                <span><img src="/img/Blooger.png" width="30" height="30" style="padding-right: 2px;" >
                    <span style="color: orangered;">
                    looger</span></span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" style="color: orangered;">
                <li>
                    <a href="{{ URL::to('/articles') }}" style="color: orange;">Home</a>
                </li>
                @if(\Auth::check())
                <li>
                    <a style="color: orange;" href="{{ URL::to('/articles/create') }}">Create Article</a>
                </li>
                 <li>
                    <a href="{{ URL::to('/register') }}" style="color: orange;">Register an new Admin</a>
                </li>
                <li>
                    <a href="{{ URL::to('/logout') }}" style="color: orange;">Logout</a>
                </li>

                @endif
                @if(!\Auth::check())
                    <li>

                        <a style="color: orange;" href="{{ URL::to('/login') }}">Login</a>

                    </li>
                @endif
                {{--<li>--}}
                    {{--<a href="about.html" style="color: orange;">About</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="contact.html" style="color: orange;">Contact</a>--}}
                {{--</li>--}}
                </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>