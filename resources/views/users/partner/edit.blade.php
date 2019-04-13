@extends('layouts.partner')

@section('navButton')

    <ul class="navbar-nav mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link btn btn-info btn-sm mr-2" href="{{route('partner.show',$user->id)}}">View Profile<span class="sr-only">(current)</span></a>
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
    </ul>


@stop

@section('content')


    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>User name</h1></div>
            <div class="col-sm-2">
                <a  class="pull-right">
                    @if($user->image_id)
                        @foreach($join as $image)
                            <img src="{{'/images/profile_images/'.$image->name}}"height="100" class="rounded img-responsive" title="profile image" alt="image of {{$user->name}}" >
                        @endforeach
                        @else
                        <p>No Image</p>
                    @endif
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fab fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Profile Views</strong></span> 125</li>
                    {{--<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>--}}
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    {{--<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>--}}
                </ul>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <div class="row">

                    @include('includes.form_error')

                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Personal Details</a></li>
                    {{--<li><a data-toggle="tab" href="#messages">About Yourself</a></li>--}}
                    {{--<li><a data-toggle="tab" href="#settings">Menu 2</a></li>--}}
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>

                        {!! Form::model($user,['method'=>'PATCH','action'=>['UserPartnerController@update', $user->id],'files'=>'true']) !!}
                        <div class="row">
                            <div class="form-group col-6">
                                {!! Form::label('name','Full Name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-6">
                                {!! Form::label('email','E-mail Address') !!}
                                {!! Form::text('email',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-6">
                                {!! Form::label('profession','Profession') !!}
                                {!! Form::text('profession',null,['class'=>'form-control']) !!}
                            </div>

                            <input type="hidden" name="role_id" value="2">
                            <input type="hidden" name="isActive" value="1">

                            <div class="form-group col-6">
                                {!! Form::label('image_id','Profile Image') !!}
                                {!! Form::file('image_id',['class'=>'form-control']) !!}
                            </div>

                            <div class="panel panel-default col-6">
                                <div class="panel-heading">Social Media</div>
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#face"><i class="fab fa-facebook fa-2x"></i></a></li>
                                        <li><a data-toggle="tab" href="#tweet"><i class="fab fa-twitter fa-2x"></i></a></li>
                                        <li><a data-toggle="tab" href="#pin"><i class="fab fa-pinterest fa-2x"></i></a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="face">

                                            <hr>
                                            <div class="form-group">
                                                {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook']) !!}
                                            </div>


                                        </div>

                                        <div class="tab-pane" id="tweet">
                                            <hr>
                                            <div class="form-group">
                                                {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Twitter']) !!}
                                            </div>


                                        </div>

                                        <div class="tab-pane" id="pin">
                                            <hr>
                                            <div class="form-group">
                                                {!! Form::text('pinterest',null,['class'=>'form-control','placeholder'=>'Pinterest']) !!}
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>


                        <div class="form-group col-12">
                            {!! Form::label('summary','Summary about yourself (20 words)') !!}
                            {!! Form::textarea('summary',null,['class'=>'form-control']) !!}
                        </div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add User',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                        <hr>

                    </div><!--/tab-pane-->
                    {{--<div class="tab-pane" id="messages">--}}

                        {{--<h2></h2>--}}

                        {{--{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserSocialController@update', $user->id]]) !!}--}}



                            {{--<div class="form-group">--}}
                                {{--{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}--}}
                            {{--</div>--}}
                        {{--{!! Form::close() !!}--}}

                        {{--<hr>--}}


                    {{--</div><!--/tab-pane-->--}}
                    {{--<div class="tab-pane" id="settings">--}}


                        {{--<hr>--}}

                    {{--</div>--}}

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->





@stop