@extends('layouts.blog-home')

@section('content')

    @if(count($category) > 0)

        @foreach($category as $name)

            <div class="jumbotron text-center">

                <h1>{{$name->name}} Category</h1>

            </div>

        @endforeach

    @endif

    @if(count($products) > 0)

        @foreach($products as $product)

            <h2>
                <a href="{{route('home.post',$product->id)}}">{{$product->name}}</a>
            </h2>

            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-user"></i> By <a href="#">{{$product->user->name}}</a></li>
                <li class="list-inline-item"><i class="fa fa-folder"></i> Category: <a href="#">{{$product->categories->name}}</a></li>
                <li class="list-inline-item"><span class="fa fa-business-time"></span> Updated: {{$product->updated_at->diffForHumans()}}</li>
            </ul>

            <p></p>
            <div class="owl-carousel owl-theme center" data-toggle="modal" data-target="#exampleModal">
                @if($product->images)
                    @foreach($product->images as $image)
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                            <div class="item">
                                <img height="100%" href="#portfolioModal1" loading="lazy" class="img-fluid mx-md-auto img-thumbnail" src="{{'/images/'.$image->name}}" alt="{{$product->name}}">
                            </div>
                        </a>
                    @endforeach
                @else
                    <p>No Image</p>
                @endif
            </div>
            <p class="m-2">{{$product->description}}</p>
            <a class="btn btn-primary" href="{{route('home.post',$product->id)}}"><span class="fa fa-comment"></span> {{count($product->comments)}}</a>
            <hr>
        @endforeach
        @else

        <h3>No item in this category yet</h3>

    @endif

    <!-- Pager -->
    <ul class="pagination">
        <li class="previous page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="next page-item">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>




@endsection

