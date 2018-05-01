<?php

namespace App\Transformers;

use App\Models\ClassGlobal;
use App\Transformers\FormatGlobalTransformer;


class ClassGlobalTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['formatGlobal'];
    
    public function transform(ClassGlobal $classGlobal)
    {
        return [
        	'id' => $classGlobal->id,
        	'name' => $classGlobal->name,
            'created_at' =>  $classGlobal->created_at->toDateTimeString(),
            'created_at_human' =>  $classGlobal->created_at->diffForHumans(),
            'format_global_id' => $classGlobal->format_global_id,
        ];
    }

    public function includeFormatGlobal(ClassGlobal $classGlobal)
    {
        return $this->item($classGlobal->formatGlobal, new FormatGlobalTransformer);
    }
}