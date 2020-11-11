<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medialurl extends Model
{
    protected $fillable = ['user_id','url','medialtittle_id','icon_id','is_active'];

    public function medialtittle(){
        return $this->belongsTo(MedialTittle::class);
    }
}
