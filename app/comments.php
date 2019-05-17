<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //

    protected $fillable = [

        'products_id',
        'is_active',
        'author',
        'photo',
        'email',
        'body',

    ];

    public function replies(){
        return $this->hasMany('App\commentReplies');

    }


    public function product(){
        return $this->belongsTo('App\Products','products_id');

    }

    public function rating(){

        return $this->belongsTo('App\Ratings');

    }


}
