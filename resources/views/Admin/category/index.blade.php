@extends('layouts.admin')




{{--@section('navButton')--}}

    {{--<button  class="btn btn-secondary btn-sm mr-2" <span class="sr-only">(current)</span></button>--}}
    {{--<li class="nav-item">--}}
        {{--<a class="btn btn-secondary btn-sm mr-2" href="{{route('product.create')}}">Add Item<span class="sr-only">(current)</span></a>--}}
    {{--</li>--}}


{{--@stop--}}




@section('content')

    <h1>Categories</h1>

    <div class="row">

        <div class="col-sm-6">

            {!! Form::open(['method'=>'POST','action'=>'AdminCategoryController@store']) !!}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col-sm-6">

            @if($categories)

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th class="text-center">Action</th>
                        {{--<th scope="col">Created Date</th>--}}
                    </tr>
                    </thead>

                    <tbody>
                    <?php $number = 1 ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$number++}}</td>
                            <td><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></td>
                            <td>
                                <div class="">
                                    <ul class="list-inline text-lg-center">
                                        <li class="list-inline-item">
                                            <a data-toggle="tooltip" data-placement="top" title="view" class="view" href="{{route('category.show',$category->id)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('category.edit',$category->id)}}">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>


{{--                            <td>{{$category->created_at->diffForHumans()}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @endif

        </div>
    </div>


@stop