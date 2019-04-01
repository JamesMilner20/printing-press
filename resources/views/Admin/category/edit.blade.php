@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="row">

            <div class="form-group col-sm-6">
                {!! Form::submit('Update Category',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id]]) !!}

            <div class="form-group col-sm-6">
                {!! Form::submit('Delete Category',['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>


    <div class="col-sm-6">




    </div>


@stop