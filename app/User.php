<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'color_id','picture'
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

    public function links(){
        
        
        return $this->hasMany('App\Link');
        
    }

    public function visits(){
        
        
        return $this->hasManyThrough('App\Visit', 'App\Link');
        
    }
    public function color(){
       
         return $this->belongsTo(Color::class);
        
    }

    public function linkimpression(){
        
        return $this->hasMany(LinkImpression::class);
        
    }

    public function getRouteKeyName(){
        return 'username';
    }
}
