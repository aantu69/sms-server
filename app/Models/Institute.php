<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class Institute extends Model
{
    use Orderable;
    
    protected $fillable = [
        'name', 'short_name', 'address', 'email', 'phone'
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
