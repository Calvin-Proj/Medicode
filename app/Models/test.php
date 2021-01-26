<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tests';
    protected $guarded = array();

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }

    public function attendances()
    {

        return $this->hasOne('App\Models\Attendance');

    }

    public function venues()
    {

        return $this->hasOne('App\Models\Venue');

    }

    public function modules()
    {

        return $this->belongsTo('App\Models\Module');

    }
}


