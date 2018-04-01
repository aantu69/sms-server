<?php

namespace App\Transformers;

use App\Models\Medium;


class MediumTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(Medium $medium)
    {
        return [
        	'id' => $medium->id,
        	'name' => $medium->name,
            'created_at' =>  $medium->created_at->toDateTimeString(),
            'created_at_human' =>  $medium->created_at->diffForHumans(),
        ];
    }
}