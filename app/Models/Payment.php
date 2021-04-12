<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable;
    protected $table = 'payments';

    protected $fillable = [
        'amount','description','provider_id','spot_id'
    ];
}
