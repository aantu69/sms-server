<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class ClassFormat extends Model
{
    use Orderable;

    protected $fillable = [
        'name'
    ];

    public function globalClasses(){
        return $this->hasMany('App\Models\GlobalClass');
    }
}
