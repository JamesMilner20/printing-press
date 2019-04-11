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
                    <li class="list-inline-item"><i class="fa fa-user"></i> By <a href="#">{{$product->user->name}}</a></li>
                    <li class="list-inline-item"><i class="fa fa-folder"></i> Category: <a href="#">{{$product->categories->name}}</a></li>
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


                <h5 class="card-title">Card title</h5>
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
                        <div class="item"><img height="100%" class="img-fluid mx-md-auto rounded" src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                    @endforeach
                </div>

            </div>
        </div>
            <hr>

        <!-- Blog Comments -->
        <!-- Posted Comments -->
            @if(Session::has('comment flash'))

                {{session('comment flash')}}

            @endif

        @if(count($comments) > 0)

            @foreach($comments as $comment)


                <!-- Comment -->
                <div class="media panel">
                    <a class="pull-left" href="#">
                        <img height="64px" class="media-object" src="{{'/images/profile_images/'.$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small><p>{{$comment->created_at->diffForHumans()}}</p></small>
                        </h4>
                        {{$comment->body}}

                        @if(count($replies) > 0)

                            @foreach($replies as $reply)

                                @if($reply->comments_id == $comment->id)

                                    @if($reply->is_active == 1)

                                        <!-- Nested Comment -->
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img height="64px" class="media-object" src="{{'/images/profile_images/'.$reply->photo}}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$reply->author}}
{{--                                                    <small><p>{{$reply->updated_at->diffForHumans()}}</p></small>--}}
                                                </h4>
                                                <p>{{$reply->body}}</p>
                                            </div>
                                        </div>
                                    @endif

                                @endif

                            @endforeach
                                @if(Auth::check())

                                    {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply']) !!}

                                        <input type="hidden" name="comments_id" value="{{$comment->id}}">

                                        <div class="form-group">
                                            {!! Form::label('body','Body:') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    {!! Form::close() !!}

                                @endif

                                    <!-- End Nested Comment -->

                            @else

                                @if(Auth::check())

                                    {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply']) !!}

                                    <input type="hidden" name="comments_id" value="{{$comment->id}}">

                                    <div class="form-group">
                                        {!! Form::label('body') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
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



                {!! Form::open(['method'=>'POST','action'=>'PostsCommentsController@store']) !!}

                <input type="hidden" name="products_id" value="{{$product->id}}">

                <div class="form-group">
                    {!! Form::label('body','Body') !!}
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
        {{--</div>--}}

    {{--</div>--}}




@stop

