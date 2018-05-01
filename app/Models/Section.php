<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class Section extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'created_by', 'updated_by'
    ];

    public function CreatedUser(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // public function updatedBy(){
    //     return $this->belongsTo('App\Models\User');
    // }
}
