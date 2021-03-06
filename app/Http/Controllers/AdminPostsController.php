<?php

namespace App\Http\Controllers;

use App\Categories;
use App\comments;
use App\Http\Requests\ProductRequest;
use App\Images;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use willvincent\Rateable\Rateable;

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

        $categories = Categories::all();

        return view('admin.product.index', compact('products','categories'));

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
//        $image_id = $product->id;
//        $images = DB::table('images')->where('id',$image_id);


        return view('admin.product.show',compact('product','category','images'));

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
        $product = Products::findOrFail($id);

        $categories = Categories::pluck('name','id')->all();

        return view('admin.product.edit',compact('categories','product'));
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

        $input = $request->except('image_id');

        $product = Products::findOrFail($id);

        $product->images()->delete();

        if ($files=$request->file('image_id')){

            foreach ($files as $file) {

                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);

                $product->Images()->create(['name' => $name]);

            }

        }
        $product->update($input);

        return redirect('/admin/product');
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

        $product = Products::findOrFail($id);

//        unlink(public_path().$product->Images->name);

        $product->images()->delete();

        $product->delete();

        Session::flash('deleted_user',$product->name.' has been Deleted');

        return redirect('/admin/product');

    }


    public function posts($id)
    {

        $product = Products::findOrFail($id);

        $comments = $product->comments()->whereIsActive(1)->get();
//
        $replies = DB::table('comment_replies')->get();

        $categories = Categories::all();

        foreach ($product->ratings as $review){

            $rateable_id = $review->rateable_id;
        }

        $reviews = DB::table('comments')->join('ratings','comments.id','=','ratings.comment_id')
            ->select('comments.author','comments.photo','comments.body', 'ratings.rating','ratings.created_at')->get();


//        $replies = dd($comments->replies)->whereIsActive(1)->get();

        return view('posts',compact('product','comments','replies','categories','rateable','reviews'));



    }

    public function category($id)
    {

        $products = Products::whereCategoriesId($id)->orderBy('created_at','desc')->get();

        $category = Categories::whereId($id)->get();

        $categories = Categories::all();

        return view('category',compact('products','categories','category'));



    }

    public function partner($id)
    {

        $products = Products::whereUserId($id)->orderBy('created_at','desc')->get();

        $user = User::whereId($id)->get();

        $categories = Categories::all();

        return view('partner',compact('products','categories','user'));



    }

    public function welcome()
    {

        $products = Products::orderBy('created_at','desc')->paginate(4);

        $categories = Categories::all();

        return view('welcome',compact('products','categories'));

    }



}
