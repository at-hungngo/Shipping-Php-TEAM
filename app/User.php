<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Bid;
use App\Order;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'point', 'age', 'sex', 'description', 'role_id',
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Roles
     *
     * @return Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Bids
     *
     * @return bids
     */
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * Orders
     *
     * @return orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
