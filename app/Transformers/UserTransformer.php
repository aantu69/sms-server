<?php

namespace App\Transformers;

use App\Models\User;


class UserTransformer extends \League\Fractal\TransformerAbstract
{
    
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
        	'name' => $user->name,
        	'email' => $user->email,
            'password' => $user->password,
            'created_at' =>  $user->created_at->toDateTimeString(),
            'created_at_human' =>  $user->created_at->diffForHumans(),
        ];
    }
}