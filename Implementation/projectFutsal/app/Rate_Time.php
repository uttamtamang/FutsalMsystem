<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate_Time extends Model
{
    //
    protected $table = "rate_times";

    protected $fillable = ['time', 'ground_id', 'rate'
    ];
}
