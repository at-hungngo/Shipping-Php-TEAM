<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Role extends Model
{
    use SoftDeletes;
    
    protected $table = 'roles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name'
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

    /**
     * Id of role user or admin
     *
     * @param string $roleName Name of role
     *
     * @return id
     */
    public static function roleId($roleName)
    {
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            return $role->id;
        } else {
            return -1;
        }
    }
}
