<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract
{
    //
    public function transform(User $user)
    {
        return [
            'name'        => $user->name,
            'email'       => $user->email,
            'registered'  => $user->created_at->diffForHumans(),
        ];
    }
}