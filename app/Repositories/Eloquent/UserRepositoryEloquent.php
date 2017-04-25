<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\UserRepository;
use App\Models\User;
use App\Models\Role;
use App\Validators\UserValidator;
use App\Presenters\UserPresenter;

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

    /**
     * Apply UserPresenter
     *
     * @return mixed
     */
    public function presenter()
    {
        return UserPresenter::class;
    }

    /**
     * Update a entity in repository by id
     *
     * @param array  $attributes Attributes
     * @param number $id         Id of user
     *
     * @throws ValidatorException
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        return parent::update(self::setAttributes($attributes), $id);
    }

    /**
     * Save a new entity in repository
     *
     * @param array $attributes Attributes
     *
     * @throws ValidatorException
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return parent::create(self::setAttributes($attributes));
    }

     /**
     * Retrieve first data of repository, or return new Entity
     *
     * @param array $attributes attributes
     *
     * @return mixed
     */
    public function firstOrNew(array $attributes = [])
    {
        return parent::firstOrNew(self::setAttributes($attributes));
    }

    /**
     * Retrieve first data of repository, or create new Entity
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public function firstOrCreate(array $attributes = [])
    {
        return parent::firstOrCreate(self::setAttributes($attributes));
    }

    /**
     * Set attributes
     *
     * @param array $attributes Attributes
     *
     * @return mixed
     */
    public static function setAttributes(array $attributes = [])
    {
        $attributes['role_id'] = Role::roleId('user');
        if ($attributes['password']) {
            $attributes['password'] = bcrypt($attributes['password']);
        }
        return $attributes;
    }
}
