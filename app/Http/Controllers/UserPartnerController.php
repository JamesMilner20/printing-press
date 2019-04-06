<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Images;
use App\Products;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::orderBy('created_at','desc')->get();

        $products = Products::orderBy('created_at','desc')->paginate(4);

        $join = DB::table('users')->join('images', 'users.image_id', '=', 'images.id')
            ->select( 'images.name','users.id')->get();

        return view('users.partner.index', compact('users','products','join'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name','id')->all();

        return view('users.partner.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //

        $input = $request->all();

        if($file=$request->file('image_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images/profile_images',$name);

            $photo = Images::create(['name'=>$name]);

            $input['image_id'] = $photo->id;

        }

        User::create($input);

        return redirect('/users/partner');

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

        $user = User::findOrFail($id);

        $join = DB::table('users')->join('images', 'users.image_id', '=', 'images.id')
            ->select( 'images.name')->where('users.id',$id)->get();

//        $number = $product->categories_id;
//        $category = DB::table('categories')->where('id',$number)->first();

        return view('users.partner.show',compact('user','join'));

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

        $user = User::findOrFail($id);

        $join = DB::table('users')->join('images', 'users.image_id', '=', 'images.id')
            ->select( 'images.name')->where('users.id',$id)->get();


        $roles = Role::pluck('name','id')->all();

        return view('users.partner.edit', compact('user','roles','join'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);

        $input = $request->all();

        if($file=$request->file('image_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images/profile_images',$name);

            $photo = Images::create(['name'=>$name]);

            $input['image_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('/users/partner');


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
