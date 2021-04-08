<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Provider extends Model
{
    use Notifiable;
    protected $table = 'providers';

    protected $fillable = [
        'dob','bussines_name','address','bussines_phone'.'website'
    ];

    public function spots()
    {
        return $this->belongsToMany('App\Models\Spot','payments','provider_id','spot_id');
    }
}
