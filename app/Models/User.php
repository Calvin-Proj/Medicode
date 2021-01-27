<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function module()
    {

  return $this->hasOne('App\Models\Module');

    }

    public function modules()
    {

  return $this->belongsToMany('App\Models\Module');

    }

    public function attendances()
    {

        return $this->hasMany('App\Models\Attendance');

    }

    public function sicktest_notes()
    {

        return $this->hasMany('App\Models\Sick_Note');

    }

    public function bookings()
    {

        return $this->hasMany('App\Models\Booking');

    }
}
