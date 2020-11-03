<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable=['user_id','name','link'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function visits(){
        return $this->hasMany('App\Visit');
    }

    public function latest_visit(){
        return $this->hasOne('App\Visit')->latest();
    }
}