<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image_id','role_id','isActive','profession','facebook','twitter','pinterest','summary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function products(){

        return $this->hasMany('App\Products');

    }

    public function image(){
        return $this->belongsTo('App\Images');
    }


    public function isAdmin(){
        if($this->role->name == "Admin" && $this->isActive == 1){
            return true;

        }

        return false;
    }

    public function isPartner(){

        if($this->role->name == "Partner" && $this->isActive == 1){

            return true;

        }

        return false;
    }




}
