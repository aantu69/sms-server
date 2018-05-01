<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class ClassGlobal extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'format_global_id'
    ];

    public function FormatGlobal(){
        return $this->belongsTo('App\Models\FormatGlobal');
    }
}
