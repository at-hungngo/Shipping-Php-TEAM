<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Bid;
use App\Order;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait, SoftDeletes, HasApiTokens, Notifiable;

    const SEX = [
        '1' => 'Male',
        '0' => 'Female'
    ];

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

    /**
     * Sex label
     *
     * @return sex
     */
    public function sexLable()
    {
        return self::SEX[$this->sex];
    }
}
