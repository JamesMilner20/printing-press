<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\AdminCategoryRequest;
use App\Images;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = Categories::all();


        return view('admin.category.index', compact('categories'));

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
        $input = $request->all();

        if($file=$request->file('image_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Images::create(['name'=>$name]);

            $input['image_id'] = $photo->id;

        }

        Categories::create($input);

        return redirect('/admin/category');

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

        $category = Categories::findOrFail($id);

        return view('admin.category.edit',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryRequest $request, $id)
    {
        //

        $category = Categories::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('image_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Images::create(['name'=>$name]);

            $input['image_id'] = $photo->id;

        }

        $category -> update($input);

        return redirect('/admin/category');

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

        Categories::findOrfail($id)->delete();

        return redirect('/admin/category');

    }
}
