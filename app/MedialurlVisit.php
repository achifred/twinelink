<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedialurlVisit extends Model
{
    protected $fillable =['medialurl_id','user_agent'];

    public function mediaurl(){
        return $this->belongsTo(Medialurl::class);
    }
}
