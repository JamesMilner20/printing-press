@extends('layouts.admin')

@section('navButton')


    {{--<li class="nav-item">--}}
        <a class="btn btn-secondary btn-sm border-white" href="{{route('users.create')}}">Create User<span class="sr-only">(current)</span></a>
    {{--</li>--}}
         {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Dropdown--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--<a class="dropdown-item" href="#">Action</a>--}}
                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
            {{--</div>--}}
        {{--</li>--}}



@stop

@section('custom')

    <style>
        /*.card-body{*/
        /*height: 540px;*/
        /*}*/


    </style>


    @stop


@section('content')

    <div class="panel">

        {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
        {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
        @if(Session::has('deleted_user'))

            <p>{{session('deleted_user')}}</p>

        @endif


    </div>

    @if($join)

        @foreach($users as $user)



            <div class="card mb-3">
                <div class="card-body pt-5 m-0 bg-light">
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="text-center col-md-12 m-0">
                            @if($user->image_id)
                                @foreach($join as $image)
                                    @if($image->id == $user->id)
                                        <img height="150px" class="img-responsive rounded" src="{{'/images/profile_images/'.$image->name}}" alt="Card image cap">
                                    @endif
                                @endforeach
                            @else
                                <p>No Image</p>
                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a data-toggle="tooltip" data-placement="top" class="view text-capitalize" href="{{route('users.edit',$user->id)}}">
                                        {{$user->name}}
                                    </a>
                                </h5>
                                <p class="card-text text-justify">{{$user->summary}}</p>
                                <div class="btn-group-vertical">
                                    <ul class="list-group list-group-flush text-left col-md-12">
                                        @if($products)
                                            @foreach($products as $product)
                                                @if($user->id == $product->user_id)
                                                    <a type="button" class="btn-secondary col-md-12 small m-1 p-1"  href="{{route('home.post',$product->id)}}">
                                                        <div class="row">
                                                            <span class="col-7">{{$product->name}}</span>
                                                            <span class="col-5">{{$product->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </a>

                                                @endif
                                            @endforeach

                                        @endif
                                    </ul>
                                </div>
                                <br>
                                @if($user->facebook)
                                    <a href="{{$user->facebook}}" class="btn btn-just-icon btn-link btn-dribbble"><i class="fab fa-facebook"></i></a>
                                @endif
                                @if($user->twitter)
                                    <a href="{{$user->twitter}}" class="btn btn-just-icon btn-link btn-twitter"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($user->pinterest)
                                    <a href="{{$user->pinterest}}" class="btn btn-just-icon btn-link btn-pinterest"><i class="fab fa-pinterest"></i></a>
                                @endif
                                {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    @endif

@stop