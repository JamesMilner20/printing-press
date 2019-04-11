<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\HomeSearchRequest;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::whereIsActive(1)->orderBy('created_at','desc')->get();

        $categories = Categories::all();

        return view('home',compact('products','categories'));
    }

    public function search(HomeSearchRequest $request)
    {
        $searchResults = (new Search())
            ->registerModel(Products::class, 'name')
            ->registerModel(User::class, 'name')
            ->perform($request->input('query'));

        return view('search', compact('searchResults'));
    }



}
