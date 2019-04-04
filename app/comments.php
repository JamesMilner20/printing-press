<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //

    protected $fillable = [

        'product_id',
        'is_active',
        'author',
        'photo',
        'email',
        'body',

    ];

    public function relies(){
        return $this->hasMany('App\commentReplies');

    }


    public function product(){
        return $this->belongsTo('App\Products');

    }


}
