<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    protected $fillable = [

        'categories_id',
        'sub-categories_id',
        'image_id',
        'name',
        'description'


    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function images(){

        return $this->belongsToMany('App\Images');

    }

    public function category(){

        return $this->belongsTo('App\Categories');

    }




}
