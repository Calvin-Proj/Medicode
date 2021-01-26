<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    public function tests()
    {

        return $this->hasOne('App\Models\Test');

    }

    public function buildings()
    {

        return $this->belongsTo('App\Models\Building');

    }

}
