<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Provider extends Model
{
    use Notifiable;
    protected $table = 'providers';

    protected $fillable = [
        'dob','bussines_name','address','business_phone','website','users_id'
    ];

    public function spots()
    {
        return $this->belongsToMany('App\Models\Spot','payments','provider_id','spot_id');
    }
    public function spotss()
    {
        return $this->hasMany('App\Models\Spot','providers_id','id');
    }
}
