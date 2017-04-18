<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Role;

class RoleRepository extends BaseRepository
{
    /**
     * Make model
     *
     * @return void
     */
    public function model()
    {
        return Role::class;
    }
}
