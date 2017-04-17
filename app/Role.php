<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];

    /**
     * Users
     *
     * @return users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
