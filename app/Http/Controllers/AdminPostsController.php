<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\ProductRequest;
use App\Images;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::orderBy('created_at','desc')->get();
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Categories::pluck('name','id')->all();

        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //

        $input = $request->except('image_id');

        $user = Auth::user();

        $product = $user->Products()->create($input);

        if ($files=$request->file('image_id')){

            foreach ($files as $file) {

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $product->Images()->create(['name' => $name]);

            }
        }


        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $product = Products::findOrFail($id);
        $number = $product->categories_id;
        $category = DB::table('categories')->where('id',$number)->first();
        $image_id = $product->image_id;
        $image = DB::table('images')->where('id',$image_id)->first();


        return view('admin.product.show',compact('product','category','image'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
