@extends('layouts.admin')



@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>

                    <div class="card-body">
                        <div class="row">

                            @include('includes.form_error')

                        </div>

                        {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>'true']) !!}
                            <div class="form-group">
                                {!! Form::label('name','Item Title') !!}
                                {!! Form::text('name',null,['class'=>"form-control"]) !!}

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif

                            </div>

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::label('categories_id','category') !!}
                                {!! Form::select('categories_id',[''=>'category']+$categories,null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image_id','Product Image') !!}
                                {!! Form::file('image_id[]', ['roles'=>'form','multiple'=>'multiple','class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Description') !!}
                                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>




@stop