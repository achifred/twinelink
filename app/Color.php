<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable =['background_color','text_color'];

    public function user(){
        
            return $this->hasMany(User::class);
        
    }
}
