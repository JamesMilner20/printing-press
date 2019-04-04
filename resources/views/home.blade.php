@extends('layouts.blog-home')

@section('content')
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Dashboard</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--You are logged in!--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <!-- First Blog Post -->
    <h2>
        <a href="#">Blog Post Title</a>
    </h2>
    <p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>
    <p><span class="fa fa-business-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
    <hr>
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
    <a class="btn btn-primary" href="#">Read More <span class="fa fa-chevron-right"></span></a>

    <hr>

    <!-- Pager -->
    <ul class="pagination">
        <li class="previous page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="next page-item">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>


@endsection
