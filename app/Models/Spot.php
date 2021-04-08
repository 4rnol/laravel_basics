<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Spot extends Model
{
    use Notifiable;
    protected $table = 'spots';

    protected $fillable = [
        'name','title','subtitle','description','status'
    ];

    public function providers()
    {
        return $this->belongsToMany('App\Models\Provider','payments','spot_id','provider_id');
    }
}
