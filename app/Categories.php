<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    protected $fillable = [

        'name'



    ];

    public function product(){

        return $this->belongsTo('App\Products');

    }


}
