<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use willvincent\Rateable\Rateable;

class Products extends Model implements Searchable
{
    //

    use Rateable;

    protected $fillable = [

        'categories_id',
        'sub-categories_id',
        'image_id',
        'name',
        'description',
        'is_active',
        'user_id'


    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function images(){

        return $this->belongsToMany('App\Images')->orderBy('updated_at','desc');

    }

    public function categories(){

        return $this->belongsTo('App\Categories');

    }

    public function comments(){

        return $this->hasMany('App\Comments');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('home.post', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }





}
