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
            <a class="navbar-brand nav-link @yield('land')" href="{{url('/')}}">
                <img class="rounded-circle d-inline-block align-top" src="../img/logo.png" width="30" height="30" alt=""> Kanfa Grafix
            </a>
            <!-- Brand and toggle get grouped for better mobile display -->

            <button type="button" class="navbar-toggler" data-toggle="collapse"  data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
{{--                <a class="navbar-brand nav-link @yield('land')" href="{{url('/')}}"> </a>--}}

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
                    @endif
                    @else
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
                        @endguest
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->

        @yield('content')

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
<!-- /.container -->

<!-- Scripts -->
<script src="{{ asset('js/libs.js')}}" ></script>

<script src="{{ asset('js/app.js') }}" ></script>




</body>

</html>
