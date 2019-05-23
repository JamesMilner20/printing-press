<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kanfa Grafix - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<div id="app">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand nav-link @yield('land')" href="{{url('/')}}">
                <img class="rounded-circle d-inline-block align-top" src="../img/logo.png" width="30" height="30" alt=""> Kanfa Grafix
            </a>
            <!-- Brand and toggle get grouped for better mobile display -->

            <button type="button" class="navbar-toggler" data-toggle="collapse"  data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                <ul class="navbar-nav ml-auto text-center main-nav">

                    <li class="nav-item">
                        <a class="nav-link @yield('active')" href="{{route('about')}}">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('contact')" href="#">Partners </a>
                    </li>
                {{--</ul>--}}

                {{--<ul class="ml-auto">--}}
                <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>

                    @endguest
                    @else

                        <li class="nav-item dropdown dropdown-slide" id="markasread">
                            <a class="nav-link dropdown-toggle @yield('home')"  role="button" data-toggle="dropdown">
                                <span class="fa fa-globe-africa"></span> Notification <span class="badge badge-light">{{count(auth()->user()->unreadNotifications)}}</span>
                            </a>

                            <div class="dropdown-menu">
                                {{--<li>--}}
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    @include('layouts.partials.'.snake_case(class_basename($notification->type)))
                                    {{--<a href="#">{{snake_case(class_basename($notifications->type))}}</a>--}}
                                    @empty
                                    <a class="dropdown-item" href="#">No Unread Notification</a>
                                @endforelse
                                {{--</li>--}}
                            </div>
                        </li>

                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle @yield('home')" href="{{url('/home')}}" role="button" data-toggle="dropdown">
                                Home <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item @yield('home')" href="{{url('/home')}}" >
                                    Home
                                </a>
                                @if(Auth::user()->role_id == 1 )

                                    <a class="dropdown-item" href="{{url('/admin')}}" >
                                        Admin Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{route('users.edit',Auth::user()->id)}}">{{ Auth::user()->name }}</a>

                                @elseif(Auth::user()->role_id == 2 )

                                    <a class="dropdown-item" href="{{url('/partner')}}" >
                                        Partner Dashboard
                                    </a>

                                    <a class="dropdown-item" href="{{route('partner.edit',Auth::user()->id)}}">{{ Auth::user()->name }}</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 mt-2">

               @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 mt-2">

                <!-- Blog Search Well -->
                <div class="panel p-3 m-3 border-dark border rounded">
                    <h4>Search</h4>
                    <div>

                        @include('includes.form_error')

                    </div>
                    <form action="{{ route('search') }}" method="POST">
                            @csrf

                        <div class="input-group">

                            {!! Form::text('query',null,['class'=>'form-control']) !!}

                            <span class="input-group-append">
                                {!! Form::submit('Search',['class'=>'btn btn-sm btn-primary']) !!}
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="panel p-3 m-3 border-dark border rounded">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-6 offset-3">
                            <ul class="list-unstyled">
                                @if(count($categories) > 0)

                                    @foreach($categories as $category)

                                        <li>
                                            <a href="{{route('home.category',$category->id)}}">{{$category->name}}</a>
                                        </li>

                                    @endforeach

                                @endif

                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Your Website 2018</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item">
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        {{--<footer>--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<p>Copyright &copy; Your Website 2014</p>--}}
                {{--</div>--}}
                {{--<!-- /.col-lg-12 -->--}}
            {{--</div>--}}
            {{--<!-- /.row -->--}}
        {{--</footer>--}}

    </div>


</div>
<!-- /.container -->

<!-- Scripts -->
<script src="{{ asset('js/libs.js')}}" ></script>

<script src="{{ asset('js/app.js') }}" ></script>




</body>

</html>
