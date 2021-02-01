<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        $tests = DB::table('tests')
        ->join('venues', 'tests.venue_id', '=', 'venues.id')
        ->select('tests.*', 'venues.venue_name', 'modules.module_name')
        ->get();
        return $tests;
    }

    public function getStudData()
    {
        //needs data from module relation lecturer name venue info
        $currentDate = date("Y-m-d");
        return static::where('test_date','>=',$currentDate)->orderBy('created_at','desc')->get();
    }

    public function getSickStudData()
    {
        //needs data from module relation venue info
        $currentDate = date("Y-m-d");
        return static::where('test_type','Sick Test')->where('test_date','>=',$currentDate)->orderBy('created_at','desc')->get();
    }

    public function getInvigTestData()
    {
        //needs data from module relation venue info
        $currentDate = date("Y-m-d");
        return static::where('test_date','>=',$currentDate)->orderBy('created_at','desc')->get();
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

    public function attendance()
    {

        return $this->hasOne('App\Models\Attendance');

    }

    public function venue()
    {

        return $this->hasOne('App\Models\Venue');

    }

    public function module()
    {

        return $this->belongsTo('App\Models\Module');

    }
    public function users()
    {

        return $this->belongsToMany('App\Models\User');

    }
}


