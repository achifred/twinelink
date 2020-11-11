<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedialTittle extends Model
{
    protected $fillable =['user_id','tittle','cover_art','preview','is_active'];

    public function mediaurl(){
      
        return $this->hasMany(Medialurl::class);
        
    }
}
