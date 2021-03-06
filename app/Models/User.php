<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laravel\Passport\HasApiTokens;
use App\Traits\Orderable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, EntrustUserTrait, Orderable;

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

    public function institute(){
        return $this->belongsTo('App\Models\Institute');
    }

    public static function boot()
    {
        parent::boot();
        User::observe(new \App\Observers\UserActionsObserver);
    }
}
