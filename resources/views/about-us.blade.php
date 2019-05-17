@extends('layouts.app')

@section('active')

    active

@stop

@section('content')

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <!-- Title text -->
                <h3>About Us</h3>
            </div>
        </div>
    </div>
    <hr>
    <section class="pt-0 pb-0">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="img/kanfa.jpg" class="img-fluid w-100 rounded" alt="">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pt-lg-0">
                <div class="about-content text-justify">
                    <h3 class="font-weight-bold">Introduction</h3>
                    <p>Kanfa Grafix is a growing printing press in Kumasi which has a focus on developing and promoting the talents
                        of Graphic Designers. Kanfa has a niche of partner designers who have most of their individual jobs published on this website.
                    We look forward to become partners with various printing presses located all over Ghana and Africa to help promote and bring out local designers in communities</p>
                    <h3 class="font-weight-bold">How we can help</h3>
                    <p>Sign up to become a designer. This gives you access to the platform where all your designs can be saved for the public to appreciate you.
                    Are you a user who loves the designs of a particular designer? Give a 5 Star rating to that designer and then slide into any of the social media accounts the designer made available to contact for your personlized designs.</p>
                </div>
            </div>
        </div>
    </div>

    </section>
    <hr>
    <section class=" pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading text-center text-capitalize font-weight-bold py-5">
                        <h2>our team</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top" src="images/1554495904man2.jpg" class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Founder / CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top" src="images/1554495904man2.jpg" class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Founder / CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top" src="images/1554495904man2.jpg" class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Founder / CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img class="card-img-top" src="images/1554495904man2.jpg" class="img-fluid w-100" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Founder / CEO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="pt-0 pb-0">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-3 col-sm-6 my-lg-0 my-3 lead">--}}
                    {{--<div class="counter-content text-center bg-light py-4 rounded">--}}
                        {{--<i class="fa fa-smile d-block"></i>--}}
                        {{--<span class="counter my-2 d-block" data-count="2413" >0</span>--}}
                        {{--<h5>Users</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-sm-6 my-lg-0 my-3">--}}
                    {{--<div class="counter-content text-center bg-light py-4 rounded">--}}
                        {{--<i class="fa fa-user d-block"></i>--}}
                        {{--<span class="counter my-2 d-block" data-count="1013">0</span>--}}
                        {{--<h5>Partners</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-sm-6 my-lg-0 my-3">--}}
                    {{--<div class="counter-content text-center bg-light py-4 rounded">--}}
                        {{--<i class="fa fa-list d-block"></i>--}}
                        {{--<span class="my-2 d-block" >0</span>--}}
                        {{--<h5>Posts</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-sm-6 my-lg-0 my-3">--}}
                    {{--<div class="counter-content text-center bg-light py-4 rounded">--}}
                        {{--<i class="fa fa-smile-o d-block"></i>--}}
                        {{--<span class="counter my-2 d-block" data-count="200">0</span>--}}
                        {{--<h5>Happy Customers</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


@endsection

