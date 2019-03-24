<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    protected $uploads = '/images/';

    protected $fillable = ['name'];

    public function getFileAttribute($photo){
        return $this->uploads.$photo;
    }



}
