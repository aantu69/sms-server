<?php

namespace App\Transformers;

use App\Models\Section;
use App\Transformers\UserTransformer;

class SectionTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['createdUser'];
    
    public function transform(Section $section)
    {
        return [
        	'id' => $section->id,
            'name' => $section->name,
            'created_by' =>  $section->created_by,
            'updated_by' =>  $section->updated_by,
            'created_at' =>  $section->created_at->toDateTimeString(),
            'created_at_human' =>  $section->created_at->diffForHumans(),
            'updated_at' =>  $section->updated_at->toDateTimeString(),
            'updated_at_human' =>  $section->updated_at->diffForHumans(),
        ];
    }

    // public function includeCreatedUser(Section $section)
    // {
    //     return $this->item($section->createdUser, new UserTransformer);
    // }
    public function includeCreatedUser(Section $section)
    {
        return $this->item($section->user, new UserTransformer);
    }

    // public function includeUpdatedBy(Section $section)
    // {
    //     return $this->item($section->updatedBy, new UserTransformer);
    // }
}