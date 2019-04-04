<?php

namespace App\Http\Controllers;

use App\commentReplies;
use App\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }


    public function createReply(Request $request)
    {
        //
        $user = Auth::user();

        $data = [

            'comment_id' => $request->comment_id,
            'author'=> $user->name,
            'email'=>$user->email,
            'photo'=>$user->image->name,
            'body'=>$request->body



        ];


        commentReplies::create($data);

        $request->session()->flash('reply flash','Your reply has been submitted to the administrator for moderation');

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

        $comment = comments::findOrfail($id);

        $replies = DB::table('comment_replies')->where('comment_id',$comment->id)->get();

        return view('admin.comments.replies.show',compact('replies','comment'));


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

        commentReplies::findOrFail($id)->update($request->all());

        return redirect()->back();



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

        commentReplies::findOrFail($id)->delete();

        return redirect()->back();

    }
}
