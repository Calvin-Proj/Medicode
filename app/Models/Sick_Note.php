<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sick_Note extends Model
{
    use HasFactory;

    public function users()
    {

        return $this->belongsTo('App\Models\User'); //student sick note

    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }
}
