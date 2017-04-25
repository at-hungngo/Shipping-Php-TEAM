<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Role;

class UserObserver
{
    /**
     * Listen to the User saving event.
     *
     * @param User $user User
     *
     * @return void
     */
    public function saving(User $user)
    {
        $user->role_id = Role::roleId('user');
        if ($user['password']) {
            $user['password'] = bcrypt($user['password']);
        }
    }
}
