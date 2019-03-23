<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
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

        return $this->belongsTo('App\images');

    }

    public function category(){

        return $this->belongsTo('App\categories');

    }




}
