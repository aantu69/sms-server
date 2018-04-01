<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class GlobalClass extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'class_format_id'
    ];

    public function classFormat(){
        return $this->belongsTo('App\Models\ClassFormat');
    }
}
