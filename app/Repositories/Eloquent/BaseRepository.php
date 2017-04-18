<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * Model.
     *
     * @var model
     */
    protected $model;

    /**
     * Construct
     *
     * @param App $app Container
     *
     * @return void
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Abstract function model
     *
     * @return void
     */
    abstract public function model();

    /**
     * Make model
     *
     * @return void
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }


    /**
     * Get all data
     *
     * @return data
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param number $limit   limit
     * @param arrary $columns columns
     *
     * @return data with paginate
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    /**
     * Find data by id.
     *
     * @param number $id      id.
     * @param arrary $columns columns.
     *
     * @return data
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Save a new entity in repository
     *
     * @param array $input input
     *
     * @return void
     */
    public function store(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * Update a entity in repository
     *
     * @param arrary $input input
     * @param number $id    id
     *
     * @return void
     */
    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($input);
        $model->save();

        return $this;
    }
    
    /**
     * Destroy a entity in repository
     *
     * @param number $id id
     *
     * @return void
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
