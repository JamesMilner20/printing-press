<?php

namespace App\Http\Controllers;

use App\comments;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $comments = Comments::all();

        return view('admin.comments.index',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = Auth::user();

        $data = [

            'products_id' => $request->products_id,
            'author'=> $user->name,
            'email'=>$user->email,
            'photo'=>$user->image ? $user->image->name : 'noImage.png',
            'body'=>$request->body

        ];

        $comment = Comments::create($data);

        $product = Products::find($request->products_id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;

        $rating->user_id = $user->id;

        $rating->comment_id = $comment->id;

        $product->ratings()->save($rating);

        $request->session()->flash('comment flash','Your comment has been posted');

        return redirect()->back();
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

        $comments = $product->comments;

        return view('admin.comments.show',compact('comments'));


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

        $user = Auth::user();

        $product = Products::find($request->products_id);
        $rating->rating = $request->rate;

        $rating->user_id = $user->id;



        $product->ratings()->save($rating);

        Comments::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');

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

        Comments::findOrFail($id)->delete();

        return redirect()->back();


    }
}
