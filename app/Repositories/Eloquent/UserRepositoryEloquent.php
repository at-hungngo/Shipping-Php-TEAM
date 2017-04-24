<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\UserRepository;
use App\Models\User;
use App\Validators\UserValidator;
// Use App\Models\Role;

/**
 * Class UserRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     *
     * @return void
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    // /**
    //  * Update a entity in repository by id
    //  *
    //  * @throws ValidatorException
    //  *
    //  * @param array $attributes
    //  * @param       $id
    //  *
    //  * @return mixed
    //  */
    // public function update(array $attributes, $id)
    // {
    //     $attributes['role_id'] = Role::roleId('user');
    //     parent::update($attributes);
    // }

    // /**
    //  * Save a new entity in repository
    //  *
    //  * @throws ValidatorException
    //  *
    //  * @param array $attributes
    //  *
    //  * @return mixed
    //  */
    // public function create(array $attributes)
    // {
    //     $attributes['role_id'] = Role::roleId('user');
    //     parent::create($attributes);
    // }
}
