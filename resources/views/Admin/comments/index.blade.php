@extends('layouts.admin')


@section('content')

    @if(count($comments) > 0)

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Body</th>
        </tr>
      </thead>
      <tbody>
      @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->products_id)}}">View Post</a></td>
            <td><a href="{{route('replies.show',$comment->id)}}">View Replies</a></td>

            <td>

                @if($comment->is_active == 1)

                    {!! Form::open(['method'=>'PATCH','action'=>['PostsCommentsController@update',$comment->id]]) !!}


                    <input type="hidden" name="is_active" value="0">

                        <div class="form-group">
                            {!! Form::submit('Un-approve Comment',['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}

                    @else

                    {!! Form::open(['method'=>'PATCH','action'=>['PostsCommentsController@update',$comment->id]]) !!}


                    <input type="hidden" name="is_active" value="1">

                    <div class="form-group">
                        {!! Form::submit('Approve Comment',['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}


                @endif

            </td>

            <td>

                {!! Form::open(['method'=>'DELETE','action'=>['PostsCommentsController@destroy',$comment->id]]) !!}


                <div class="form-group">
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}




            </td>



        </tr>
          @endforeach
      </tbody>
    </table>

    @else

    <h1 class="text-center">No Comments</h1>

    @endif



@stop