<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //
    protected $table = "bookings";

    protected $fillable = ['ground_id', 'user_id', 'date',
        'time', 'phone', 'rate',
         'status','user_for'
    ];
}
