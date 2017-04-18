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
}
