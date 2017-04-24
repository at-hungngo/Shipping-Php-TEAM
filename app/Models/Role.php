<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

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
     * @return id
     */
    public function roleId($roleName)
    {
        $role = $this->where('name', $roleName)->first();
        if($role){
            return $role->id;
        } else {
            return -1;
        }
    }
}
