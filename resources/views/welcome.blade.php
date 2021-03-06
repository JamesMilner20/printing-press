@extends('layouts.app')

@section('land')

    active

    @stop

@section('title')

    Welcome

@stop

@section('content')

    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading text-uppercase">It's Great To Have You Here</div>
                {{--<a class="btn btn-primary text-uppercase js-scroll-trigger" href="bookings\booking.php">Book now for 10% discount</a>--}}
            </div>
        </div>
    </header>


    <section id="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Click any category below to view jobs done under that section.</h3>
                </div>

                @if(count($categories) > 0)

                    @foreach($categories as $category)

                        <div class="col-lg-3 col-sm-6 mt-2">
                            <div class="card my-3 my-lg-0">
                                {{--<img class="card-img-top" src="images/1555082502man3.jpg" class="img-fluid w-100" alt="Card image cap">--}}
                                <div class="card-body bg-gray text-center">
                                    <h5 class="card-title"><a href="{{route('home.category',$category->id)}}">{{$category->name}}</a></h5>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif

            </div>
        </div>
    </section>

    <hr>

    <section id="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">We worked on these designs</h2>
                    <h3 class="section-subheading text-muted">Designs were our partner designers</h3>
                </div>

                        @if(count($products) > 0)

                            @foreach($products as $product)

                                <div class="col-lg-3 col-sm-6 mt-2">
                                    <div class="card my-3 my-lg-0">
                                        <div class="mt-2 owl-carousel owl-theme center frontOwl" data-toggle="modal" data-target="#exampleModal">
                                            @if($product->images)
                                                @foreach($product->images as $image)
                                                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                                        <div class="item">
                                                            <img height="100px" href="#portfolioModal1" class="card-img-top " src="{{'/images/'.$image->name}}" alt="{{$product->name}}">
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </div>
                                        <div class="card-body bg-gray text-center">

                                            <h5 class="card-title"><a href="{{route('home.post',$product->id)}}">{{$product->name}}</a></h5>
                                            <p class="card-text">{{$product->description}}</p>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><i class="fa fa-user"></i> By <a href="{{route('home.partner',$product->user->id)}}">{{$product->user->name}}</a></li>
                                                <li class="list-group-item"><i class="fa fa-folder"></i> Category: <a href="{{route('home.category',$product->categories->id)}}">{{$product->categories->name}}</a></li>
                                                <li class="list-group-item"><span class="fa fa-business-time"></span> Updated: {{$product->updated_at->diffForHumans()}}</li>
                                                @if(count($product->comments) >= 1)
                                                    <li class="list-group-item"><a class="btn btn-primary" href="{{route('home.post',$product->id)}}"><span class="fa fa-comment"></span> {{count($product->comments)}}</a></li>
                                                @endif
                                            </ul>
                                            <a href="{{url('/home')}}">View more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                <!-- <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Web Security</h4>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@stop
