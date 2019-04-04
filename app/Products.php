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
        'description',
        'is_active',


    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function images(){

        return $this->belongsToMany('App\Images')->orderBy('updated_at','desc');

    }

    public function category(){

        return $this->belongsTo('App\Categories');

    }

    public function comments(){

        return $this->hasMany('App\comments');
    }





}
