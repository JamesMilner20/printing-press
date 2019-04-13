@extends('layouts.blog-post')



@section('content')

    {{--<div class="mt-2">--}}
        {{--<div class="row">--}}
    <div class="col-md-8">

        <!-- Blog Post -->

        <!-- Title -->
            <h1>{{$product->name}}</h1>

        <!-- Author -->

                <ul class="list-inline lead">
                    <li class="list-inline-item"><i class="fa fa-user"></i> By <a href="{{route('home.partner',$product->user->id)}}">{{$product->user->name}}</a></li>
                    <li class="list-inline-item"><i class="fa fa-folder"></i> Category: <a href="#">{{$product->categories->name}}</a></li>

                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->userAverageRating }}" data-size="xs" disabled="">

                    {{--<li class="list-inline-item"><span class="fa fa-business-time"></span> Updated: {{$product->updated_at->diffForHumans()}}</li>--}}
                </ul>


            <hr>

        <!-- Preview Image -->
        <div class="card">
            <div class="card-body">
                <div class="owl-carousel owl-theme" data-toggle="modal" data-target="#exampleModal">
                    @if($product->images)
                        @foreach($product->images as $image)
                            <div class="item"><img height="100%" class="img-fluid"  src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                        @endforeach
                    @else
                        <p>No Image</p>
                    @endif
                </div>


                {{--<h5 class="card-title">Card title</h5>--}}
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text"><small class="text-muted"><span class="fa fa-business-time"></span> Updated {{$product->updated_at->diffForHumans()}}</small></p>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($product->images as $image)
                        <div class="item"><img height="100%" class="img-fluid mx-md-auto m-2 rounded" src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                    @endforeach
                </div>

            </div>
        </div>
            <hr>



        <div class="content mt-5">
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                       aria-selected="true">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
                       aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3 class="tab-title">Comments</h3>
                    <!-- Blog Comments -->
                    <!-- Posted Comments -->
                @if(Session::has('comment flash'))

                    {{session('comment flash')}}

                @endif

                @if(count($comments) > 0)

                    @foreach($comments as $comment)


                        <!-- Comment -->
                            <div class="media panel p-3 m-3 border-dark border rounded">
                                <a class="pull-left" href="#">
                                    <img height="64px" class="media-object m-2" src="{{'/images/profile_images/'.$comment->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$comment->author}}</h4>
                                    <p>{{$comment->body}}</p>
                                    <small class="text-muted pull-right">{{$comment->created_at->diffForHumans()}}</small>

                                @if(count($replies) > 0)

                                    @foreach($replies as $reply)

                                        @if($reply->comments_id == $comment->id)

                                            @if($reply->is_active == 1)

                                                <!-- Nested Comment -->
                                                    <div class="media panel p-3 m-3 border-dark border rounded">
                                                        <a class="pull-left" href="#">
                                                            <img height="64px" class="media-object m-2" src="{{'/images/profile_images/'.$reply->photo}}" alt="">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{$reply->author}}
                                                                {{--                                                    <small><p>{{$reply->updated_at->diffForHumans()}}</p></small>--}}
                                                            </h4>
                                                            {{--                                                <p><small class="text-muted"><span class="fa fa-business-time"></span> Updated {{$reply->created_at->diffForHumans()}}</small></p>--}}
                                                            <p>{{$reply->body}}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                            @endif

                                        @endforeach
                                        @if(Auth::check())



                                                @include('includes.form_error')



                                            {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply']) !!}

                                            <input type="hidden" name="comments_id" value="{{$comment->id}}">

                                            <div class="input-group">

                                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1, 'placeholder'=>'Reply']) !!}

                                                <span class="input-group-append">

                                                {!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
                                                </span>
                                            </div>
                                            {!! Form::close() !!}

                                        @endif

                                    <!-- End Nested Comment -->

                                    @else

                                        @if(Auth::check())

                                            {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply']) !!}

                                            <input type="hidden" name="comments_id" value="{{$comment->id}}">

                                            <div class="input-group">

                                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1, 'placeholder'=>'Reply']) !!}

                                                <span class="input-group-append">

                                                {!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
                                                </span>
                                            </div>
                                            {!! Form::close() !!}

                                        @endif

                                    @endif

                                </div>
                            </div>

                    @endforeach

                @endif

                @if(Auth::check())


                    <!-- Comments Form -->
                        <div class="well">
                            <h4>Leave a Comment:</h4>

                            @include('includes.form_error')

                            {!! Form::open(['method'=>'POST','action'=>'PostsCommentsController@store']) !!}

                            <input type="hidden" name="products_id" value="{{$product->id}}">

                            @if(!isset($product->userAverageRating))

                                <div class="rating">

                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="{{ $product->userAverageRating }}" data-size="lg">

                                </div>

                            @endif

                            <div class="form-group">
                                {!! Form::label('body') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}


                        </div>
                    @else

                        <p><a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a> to post a comment.</p>

                    @endif

                    <hr>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h3 class="tab-title">Product Review</h3>

                    

                </div>
            </div>
        </div>



    </div>


        {{--</div>--}}

    {{--</div>--}}




@stop

