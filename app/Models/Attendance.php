<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function misconducts()
    {

        return $this->hasMany('App\Models\Misconduct');

    }

    public function tests()
    {

        return $this->belongsTo('App\Models\Test');

    }

    public function User()
    {

        return $this->belongsTo('App\Models\User'); //invigilator

    }
}
