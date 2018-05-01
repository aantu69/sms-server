<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class MediumGlobal extends Model
{
    use Orderable;
    
    protected $fillable = [
        'name'
    ];

    // public static function boot()
    // {
    //     parent::boot();
    //     MediumGlobal::observe(new UserActionsObserver);
    // }
}
