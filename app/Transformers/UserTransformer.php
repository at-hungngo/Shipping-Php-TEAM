<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

/**
 * Class UserTransformer
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * Transform the \User entity
     *
     * @param \User $model User
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'          => (int) $model->id,
            'email'       => $model->email,
            'age'         => (int) $model->age,
            'point'       => (int) $model->point,
            'description' => $model->description,
            'sex'         => $model->sex,
            'role'        => $model->role_id,
            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at
        ];
    }
}
