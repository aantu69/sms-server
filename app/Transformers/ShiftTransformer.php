<?php

namespace App\Transformers;

use App\Models\Shift;


class ShiftTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(Shift $shift)
    {
        return [
        	'id' => $shift->id,
        	'name' => $shift->name,
            'created_at' =>  $shift->created_at->toDateTimeString(),
            'created_at_human' =>  $shift->created_at->diffForHumans(),
        ];
    }
}