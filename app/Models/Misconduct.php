<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misconduct extends Model
{
    use HasFactory;

    public function attendances()
    {

        return $this->belongsTo('App\Models\Attendance');

    }

    public function users()
    {

        return $this->hasMany('App\Models\User'); //students

    }
}
