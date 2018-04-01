<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class Medium extends Model
{
    use Orderable;
    
    protected $fillable = [
        'name'
    ];
}
