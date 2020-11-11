<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icontype extends Model
{
    protected $fillable =['type'];

    public function icon(){
        
            return $this->hasMany(Icon::class);
        
    }
}
