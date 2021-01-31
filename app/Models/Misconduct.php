<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misconduct extends Model
{
    use HasFactory;

    protected $table = 'misconduct';
    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function attendance()
    {

        return $this->belongsTo('App\Models\Attendance');

    }

    public function users()
    {

        return $this->hasMany('App\Models\User'); //students

    }
}
