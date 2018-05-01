<?php

namespace App\Transformers;

use App\Models\ShiftGlobal;


class ShiftGlobalTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(ShiftGlobal $shiftGlobal)
    {
        return [
        	'id' => $shiftGlobal->id,
        	'name' => $shiftGlobal->name,
            'created_at' =>  $shiftGlobal->created_at->toDateTimeString(),
            'created_at_human' =>  $shiftGlobal->created_at->diffForHumans(),
            'updated_at' =>  $shiftGlobal->updated_at->toDateTimeString(),
            'updated_at_human' =>  $shiftGlobal->updated_at->diffForHumans(),
        ];
    }
}