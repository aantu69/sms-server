<?php

namespace App\Transformers;

use App\Models\ClassFormat;
use App\Transformers\ClassTransformer;


class ClassFormatTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['globalClasses'];
    
    public function transform(ClassFormat $classFormat)
    {
        return [
            'id' => $classFormat->id,
            'name' => $classFormat->name,
            'created_at' =>  $classFormat->created_at->toDateTimeString(),
            'created_at_human' =>  $classFormat->created_at->diffForHumans(),
        ];
    }

    public function includeGlobalClasses(ClassFormat $classFormat)
    {
        return $this->collection($classFormat->globalClasses, new ClassTransformer);
    }


}