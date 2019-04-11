<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

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
