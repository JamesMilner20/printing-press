@extends('home')



@section('content')

    <h1>Admin View</h1>

    <div class="panel">

    <a href="{{'product/create'}}" class="btn btn-info">Add Product</a>

    {{--<form class="form-inline my-2 my-lg-0">--}}
    {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
    {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
    {{--</form>--}}

    </div>

    <table width="100%" class="table table-responsive product-dashboard-table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Product Title</th>
            <th class="text-center">Category</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>

        @if($products)

            @foreach($products as $product)


                <tr>

                    <td class="product-thumb">
                        @if($product->photo)
                            <img width="80px" height="auto" src="{{$product->image_id}}" alt="{{$product->name}}">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>
                    <td class="product-details">
                        <h3 class="title">{{$product->name}}</h3>
                        <span><strong>Posted: </strong><time>{{$product->created_at->diffForHumans()}}</time> </span><br>
                        <span width="20px" class="status active"><strong>Description: </strong>{{$product->description}}</span><br>
                    </td>
                    <td class="product-category"><span class="categories">Laptops</span></td>
                    <td>
                        <div class="">
                            <ul class="justify-content-center">
                                <li class="list-group-item">
                                    <a data-toggle="tooltip" data-placement="top" title="view" class="view" href="category.html">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>

@stop