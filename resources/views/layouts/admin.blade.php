<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Kanfa Grafix', 'Printing Press') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="pt-1 pb-1">
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('Printing Press', 'Printing Press') }}--}}
                {{--</a>--}}
                <a class="navbar-brand nav-link @yield('land')" href="{{url('/')}}">
                    <img class="rounded-circle d-inline-block align-top" src="../img/logo.png" width="30" height="30" alt=""> Kanfa Grafix
                </a>
            </div>
            <div class="list-group list-group-flush">
                {{--<a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>--}}
                <a href="{{route('admin.product.index')}}" class="list-group-item list-group-item-action bg-light">Products</a>
                <a href="{{route('users.index')}}" class="list-group-item list-group-item-action bg-light">Users</a>
                <a href="{{route('comments.index')}}" class="list-group-item list-group-item-action bg-light">Comments</a>
                <a href="{{route('category.index')}}" class="list-group-item list-group-item-action bg-light">Categories</a>
                <a href="{{route('users.edit',Auth::user()->id)}}" class="list-group-item list-group-item-action bg-light">Profile</a>
                {{--<a href="#" class="list-group-item list-group-item-action bg-light">Status</a>--}}
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">

                <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mt-2 mt-lg-0 btn-group " role="group">
                        {{--<li class="nav-item">--}}
                        <a class="btn btn-info btn-sm border-white" id="menu-toggle">Toggle Menu</a>
                        <a class="btn btn-info btn-sm border-white" href="{{route('home')}}">Home</a>

                        {{--</li>--}}
                            @yield('navButton')
                    {{--</ul>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}


                    {{--<ul class="navbar-nav ml-auto text-center">--}}
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-secondary btn-sm border-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-secondary btn-sm border-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown text-center">
                                <a id="navbarDropdown" class="btn btn-secondary btn-sm border-white dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

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
                </div>
            </nav>

            <div class="container-fluid">

                <main class="py-4">
                    @yield('content')
                </main>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


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
    <!-- Menu Toggle Script -->


</div>

<!-- Scripts -->
<script src="{{ asset('js/libs.js')}}"></script>

<script src="{{ asset('js/app.js') }}" ></script>

</body>






</html>
