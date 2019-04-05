@extends('layouts.blog-post')



@section('content')

    {{--<div class="mt-2">--}}
        {{--<div class="row">--}}
    <div class="col-md-8">

        <!-- Blog Post -->

        <!-- Title -->
            <h1>{{$product->name}}</h1>

        <!-- Author -->
            <p class="lead">
                by <a class="text-capitalize" href="#">{{$product->user->name}}</a>
            </p>

            <hr>

        <!-- Date/Time -->
            <p><span class="fa fa-business-time"></span> Posted {{$product->created_at->diffForHumans()}}</p>

            <hr>

        <!-- Preview Image -->
            <div class="owl-carousel owl-theme center" data-toggle="modal" data-target="#exampleModal">
                @if($product->images)
                    @foreach($product->images as $image)
                        <div class="item">
                            <img height="100%" class="img-fluid mx-md-auto rounded" style="width: 100%" src="{{'/images/'.$image->name}}" alt="{{$product->name}}">
                        </div>
                    @endforeach
                @else
                    <p>No Image</p>
                @endif
            </div>
            <hr>

        <!-- Post Content -->
                <p class="lead">{{$product->description}}</p>

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


@section('scripts')
    <script>
        $(document).ready(function(){

            $(".owl-carousel").owlCarousel();


        });


    </script>



@stop