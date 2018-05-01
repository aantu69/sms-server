<?php

namespace App\Transformers;

use App\Models\MediumGlobal;


class MediumGlobalTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(MediumGlobal $mediumGlobal)
    {
        return [
        	'id' => $mediumGlobal->id,
        	'name' => $mediumGlobal->name,
            'created_at' =>  $mediumGlobal->created_at->toDateTimeString(),
            'created_at_human' =>  $mediumGlobal->created_at->diffForHumans(),
            'updated_at' =>  $mediumGlobal->updated_at->toDateTimeString(),
            'updated_at_human' =>  $mediumGlobal->updated_at->diffForHumans(),
        ];
    }
}