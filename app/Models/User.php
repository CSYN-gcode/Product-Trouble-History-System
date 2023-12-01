<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;

use App\Models\Userlevel;
use App\Models\RapidXUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'tbl_users';

    // public function user_level()
    // {
    //     return $this->hasOne(UserLevel::class, 'id', 'user_level_id');
    // }

    public function rapidx_user_details()
    {
        return $this->hasOne(RapidXUser::class, 'id','rapidx_id');
    }

    public function user_levels(){
        return $this->hasOne(Userlevel::class, 'id', 'user_level_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
