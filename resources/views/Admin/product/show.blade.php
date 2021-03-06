@extends('layouts.admin')


@section('content')

        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <div class="row">
                            <div class="product-meta col-8">
                                <h1 class="product-title">{{$product->name}}</h1>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">{{$product->user->name}}</a></li>
                                    <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category: <a href="">{{$category->name}}</a></li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <ul class="list-inline mt-20">
                                    <li class="list-inline-item"><a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-secondary">Edit Product</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- product slider -->

                        <div class="card">
                            <div class="card-body">
                            <div class="owl-carousel owl-theme center" data-toggle="modal" data-target="#exampleModal">
                                @if($product->images)
                                    @foreach($product->images as $image)
                                        <div class="item"><img height="100%" class="img-fluid mx-md-auto rounded" style="width: 100%" src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                                    @endforeach
                                @else
                                    <p>No Image</p>
                                @endif
                            </div>


                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                                            <div class="item"><img height="100%" class="img-fluid mx-md-auto rounded" style="width: 100%" src="{{'/images/'.$image->name}}" alt="{{$product->name}}"></div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- product slider -->

                        <div class="content mt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">Specifications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
                                       aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Product Description</h3>
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Product Specifications</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                        <tr>
                                            <td>Seller Price</td>
                                            <td>$450</td>
                                        </tr>
                                        <tr>
                                            <td>Added</td>
                                            <td>26th December</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>Dhaka</td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td>Apple</td>
                                        </tr>
                                        <tr>
                                            <td>Condition</td>
                                            <td>Used</td>
                                        </tr>
                                        <tr>
                                            <td>Model</td>
                                            <td>2017</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>Dhaka</td>
                                        </tr>
                                        <tr>
                                            <td>Battery Life</td>
                                            <td>23</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <h3 class="tab-title">Product Review</h3>
                                    <div class="product-review">
                                        <div class="media">
                                            <!-- Avater -->
                                            <img src="images/user/user-thumb.jpg" alt="avater">
                                            <div class="media-body">
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="name">
                                                    <h5>Jessica Brown</h5>
                                                </div>
                                                <div class="date">
                                                    <p>Mar 20, 2018</p>
                                                </div>
                                                <div class="review-comment">
                                                    <p>
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
                                                        riamipsa eaque.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-submission">
                                            <h3 class="tab-title">Submit your review</h3>
                                            <!-- Rate -->
                                            <div class="rate">
                                                <div class="starrr"></div>
                                            </div>
                                            <div class="review-submit">
                                                <form action="#" class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-main">Sumbit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Price</h4>
                            <p>$230</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                            <h4><a href="">Jonathon Andrew</a></h4>
                            <p class="member-time">Member Since Jun 27, 2017</p>
                            <a href="">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Edit Product</a></li>
                                <li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Edit Profile</a></li>
                            </ul>
                        </div>
                        {{--<!-- Map Widget -->--}}
                        {{--<div class="widget map">--}}
                            {{--<div class="map">--}}
                                {{--<div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- Rate Widget -->--}}
                        {{--<div class="widget rate">--}}
                            {{--<!-- Heading -->--}}
                            {{--<h5 class="widget-header text-center">What would you rate--}}
                                {{--<br>--}}
                                {{--this product</h5>--}}
                            {{--<!-- Rate -->--}}
                            {{--<div class="starrr"></div>--}}
                        {{--</div>--}}
                        {{--<!-- Safety tips widget -->--}}
                        {{--<div class="widget disclaimer">--}}
                            {{--<h5 class="widget-header">Safety Tips</h5>--}}
                            {{--<ul>--}}
                                {{--<li>Meet seller at a public place</li>--}}
                                {{--<li>Check the item before you buy</li>--}}
                                {{--<li>Pay only after collecting the item</li>--}}
                                {{--<li>Pay only after collecting the item</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<!-- Coupon Widget -->--}}
                        {{--<div class="widget coupon text-center">--}}
                            {{--<!-- Coupon description -->--}}
                            {{--<p>Have a great product to post ? Share it with--}}
                                {{--your fellow users.--}}
                            {{--</p>--}}
                            {{--<!-- Submii button -->--}}
                            {{--<a href="" class="btn btn-transparent-white">Submit Listing</a>--}}
                        {{--</div>--}}

                    </div>
                </div>

            </div>
        </div>
        {{--</div>--}}

        <!-- Container End -->



@stop
