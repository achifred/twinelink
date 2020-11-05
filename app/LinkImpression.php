<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkImpression extends Model
{
    protected $fillable =['user_id','impression_count'];

    public function user(){
        
        
        return $this->belongsTo(User::class);
        
        
    }
}
