<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //
    protected $table = "bookings";

    protected $fillable = ['title', 'slug', 'image',
        'description', 'meta_title', 'meta_keywords',
        'meta_description', 'status'
    ];
}
