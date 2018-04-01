<?php

namespace App\Transformers;

use App\Models\Institute;
//use App\Transformers\UserTransformer;


class InstituteTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['users'];
    
    public function transform(Institute $institute)
    {
        return [
            'id' => $institute->id,
            'name' => $institute->name,
            'short_name' => $institute->short_name,
            'address' => $institute->address,
            'email' => $institute->email,
            'phone' => $institute->phone,
            'fax' => $institute->fax,
            'mobile' => $institute->mobile,
            'website' => $institute->website,
            'logo' => $institute->logo,
            'banner' => $institute->banner,
            'created_at' =>  $user->created_at->toDateTimeString(),
            'created_at_human' =>  $user->created_at->diffForHumans(),
        ];
    }

    public function includeUsers(Institute $institute)
    {
        return $this->collection($institute->users, new UserTransformer);
    }


}