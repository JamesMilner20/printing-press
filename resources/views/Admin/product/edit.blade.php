@extends('layouts.admin')



@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Product') }}</div>

                    <div class="card-body">
                        <div class="row">

                            @include('includes.form_error')

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="owl-carousel owl-theme center" data-toggle="modal" data-target="#exampleModal">
                                    @if($product->images)
                                        @foreach($product->images as $image)
                                            <div class="item"><img height="100%" class="img-fluid mx-md-auto rounded" style="width: 100%" src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                                        @endforeach
                                    @else
                                        <p>No Image</p>
                                    @endif
                                </div>
{{--                                <img src="{{$product->photo?$product->photo->file:'No Image'}}" alt="" class="img-responsive img-rounded">--}}
                            </div>
                            <div class="col-md-6">
                                {!! Form::model($product,['method'=>'PATCH','action'=>['AdminPostsController@update', $product->id],'files'=>'true']) !!}
                                <div class="form-group">
                                    {!! Form::label('name','Item Title') !!}
                                    {!! Form::text('name',null,['class'=>"form-control"]) !!}

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    {!! Form::label('categories_id','Category') !!}
                                    {!! Form::select('categories_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('image_id','Product Image') !!}
                                    {!! Form::file('image_id[]', ['roles'=>'form','multiple'=>'multiple','class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                                </div>

                                <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::submit('Update Product',['class'=>'btn btn-primary col-sm-12']) !!}
                                </div>
                                {!! Form::close() !!}

                                {!! Form::open(['method'=>'DELETE', 'class'=>'col-6', 'action'=>['AdminPostsController@destroy', $product->id]]) !!}
                                  <div class="form-group col-sm-12">
                                      {!! Form::submit('Delete Product',['class'=>'btn btn-danger col-sm-12']) !!}
                                  </div>
                                {!! Form::close() !!}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




@stop