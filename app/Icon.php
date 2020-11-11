<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable =['icon_path','icon_name','icontype_id'];

    public function icontype(){
        
        return $this->belongsTo(Icontype::class);
        
    }

    public function link(){
        return $this->hasMany(Link::class);
    }

}
