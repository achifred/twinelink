<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable=['link_id','user_agent'];

    public function links(){
        return $this->belongsTo('App\Link');
    }
}
