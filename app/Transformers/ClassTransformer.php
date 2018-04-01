<?php

namespace App\Transformers;

use App\Models\GlobalClass;


class ClassTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(GlobalClass $globalClass)
    {
        return [
        	'id' => $globalClass->id,
        	'name' => $globalClass->name,
        	'class_format_id' => $globalClass->class_format_id,
            'created_at' =>  $globalClass->created_at->toDateTimeString(),
            'created_at_human' =>  $globalClass->created_at->diffForHumans(),
        ];
    }
}