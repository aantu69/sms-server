<?php

namespace App\Transformers;

use App\Models\FormatGlobal;
use App\Transformers\ClassGlobalTransformer;


class FormatGlobalTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['classesGlobal'];
    
    public function transform(FormatGlobal $formatGlobal)
    {
        return [
            'id' => $formatGlobal->id,
            'name' => $formatGlobal->name,
            'created_at' =>  $formatGlobal->created_at->toDateTimeString(),
            'created_at_human' =>  $formatGlobal->created_at->diffForHumans(),
        ];
    }

    public function includeClassesGlobal(FormatGlobal $formatGlobal)
    {
        return $this->collection($formatGlobal->classesGlobal, new ClassGlobalTransformer);
    }


}