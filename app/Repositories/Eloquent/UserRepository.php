<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\User;

class UserRepository extends BaseRepository
{
    /**
     * Make model
     *
     * @return void
     */
    public function model()
    {
        return User::class;
    }
}
