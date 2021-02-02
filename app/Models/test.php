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
        //needs data from module relation venue info
        $tests = DB::table('tests')
        ->join('venues', 'tests.venue_id', '=', 'venues.id')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->join('module_user', 'modules.id', '=', 'module_user.user_id')
        ->select('tests.*', 'venues.venue_name','modules.module_name')
        ->orderBy('created_at','desc')
        ->get();
        return $tests;
    }

    public function getLectData()
    {
        $tests = DB::table('tests')
        ->join('venues', 'tests.venue_id', '=', 'venues.id')
        ->join('buildings', 'venues.building_id', '=', 'buildings.id')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->select('tests.*', 'venues.venue_name','modules.module_name', 'buildings.building_location')
        ->get();
        return $tests;
    }

    public function getStudData()
    {
        //needs data from module relation venue info
        $currentDate = date("Y-m-d");
        $tests = DB::table('tests')
        ->join('venues', 'tests.venue_id', '=', 'venues.id')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->join('module_user', 'modules.id', '=', 'module_user.user_id')
        ->select('tests.*', 'venues.venue_name','modules.module_name')
        ->where('test_type','Standard Test')
        ->where('test_date','>=',$currentDate)
        ->orderBy('created_at','desc')
        ->get();
        return $tests;
    }

    public function getSickStudData()
    {
        $currentDate = date("Y-m-d");
        $tests = DB::table('tests')
        ->join('venues', 'tests.venue_id', '=', 'venues.id')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->join('module_user', 'modules.id', '=', 'module_user.user_id')
        ->select('tests.*', 'venues.venue_name','modules.module_name')
        ->where('test_date','>=',$currentDate)
        ->where('test_type','Sick Test')
        ->orderBy('created_at','desc')
        ->get();
        return $tests;
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

    
    public function misconducts()
    {

        return $this->hasMany('App\Models\Misconduct');

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
    public function sick_notes()
    {

        return $this->hasMany('App\Models\Sick_Note');

    }
}


