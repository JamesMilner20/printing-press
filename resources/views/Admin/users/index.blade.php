@extends('layouts.admin')

@section('navButton')


    <li class="nav-item">
        <a class="btn btn-secondary btn-sm mr-2" href="{{route('users.create')}}">Create User<span class="sr-only">(current)</span></a>
    </li>
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

    <div class="card-columns">
        @if($join)

            @foreach($users as $user)

                <div class="card text-center bg-info" >
                        <img src="" alt="" class="profile"/>
                    <div class="card-body pt-5 bg-light">
                        @if($user->image_id)
                            @foreach($join as $image)
                                @if($image->id == $user->id)
                                <img height="100px" class="img-thumbnail img-responsive" src="{{'/images/profile_images/'.$image->name}}" alt="Card image cap">
                                @endif
                            @endforeach
                        @else
                            <p>No Image</p>
                        @endif
                        <h5 class="card-title">
                            <a data-toggle="tooltip" data-placement="top" class="view text-capitalize" href="{{route('users.show',$user->id)}}">
                                {{$user->name}}
                            </a>
                        </h5>
                        <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btn-group-vertical">
                            <ul class="list-group list-group-flush text-left">
                                @if($products)
                                    @foreach($products as $product)
                                        @if($user->id == $product->user_id)
                                            <a type="button" class="btn-secondary small m-0 p-1"  href="{{route('product.show',$product->id)}}">
                                                <span class="col-9">{{$product->name}}</span>
                                                <span class="col-3">{{$product->created_at->diffForHumans()}}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <a href="{{route('users.show',$user->id)}}" class="card-link">View More</a>
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
                    </div>
                </div>

            @endforeach
        @endif
    </div>




@stop