<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sick_Note extends Model
{
    use HasFactory;

    protected $table = 'sick_notes';
    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User'); //student sick note

    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }
}
