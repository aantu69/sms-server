<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class FormatGlobal extends Model
{
    use Orderable;

    protected $fillable = [
        'name'
    ];

    public function ClassesGlobal(){
        return $this->hasMany('App\Models\ClassGlobal');
    }
}
