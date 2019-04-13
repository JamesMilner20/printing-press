<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as'=>'welcome','uses'=>'AdminPostsController@welcome']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about-us',function () {
    return view('about-us');
})->name('about');

Route::get('/posts/{posts}', ['as'=>'home.post','uses'=>'AdminPostsController@posts']);

Route::get('/category/{category}', ['as'=>'home.category','uses'=>'AdminPostsController@category']);

Route::get('/partner/{partner}', ['as'=>'home.partner','uses'=>'AdminPostsController@partner']);

Route::post('/search', 'HomeController@search')->name('search');

Route::get('/authors/{user}', 'UserPartnerController@show')->name('author.show');

//Route::get('/companies/{company}', 'CompanyController@show')->name('companies.show');


Route::group(['middleware'=>'Admin'], function(){

    Route::get('/admin', function (){

        return view('admin.index');

    });

    Route::resource('admin/product', 'AdminPostsController');

    Route::post('admin/product',['as'=>'admin.product.store','uses'=>'AdminPostsController@store']);
    Route::get('admin/product/{product}',['as'=>'admin.product.show','uses'=>'AdminPostsController@show']);
    Route::get('admin/product/create',['as'=>'admin.product.create','uses'=>'AdminPostsController@create']);
    Route::get('admin/product/{product}/edit',['as'=>'admin.product.edit','uses'=>'AdminPostsController@edit']);
    Route::get('admin/product',['as'=>'admin.product.index','uses'=>'AdminPostsController@index']);
    Route::patch('admin/product/{product}',['as'=>'admin.product.update','uses'=>'AdminPostsController@update']);
    Route::delete('admin/product/{product}',['as'=>'admin.product.delete','uses'=>'AdminPostsController@destroy']);

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/category', 'AdminCategoryController');

    Route::resource('admin/comments','PostsCommentsController');

    Route::resource('admin/comments/replies','CommentsRepliesController');


});

Route::group(['middleware'=>'partner'], function(){

    Route::get('/partner', function (){

        return view('partners.index');

    });

    Route::resource('partners/product', 'PartnerPostsController');

    Route::resource('users/partner', 'UserPartnerController');

});



Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply','CommentsRepliesController@createReply');

    Route::post('comment/posts','PostsCommentsController@store');

});
