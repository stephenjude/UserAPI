<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->format('d-m-Y'),
            'updated_at' => $user->updated_at->format('d-m-Y'),
        ];
    }
}
