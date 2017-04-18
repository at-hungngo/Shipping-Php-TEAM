<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{

    /**
     * Retrieve all data of repository
     *
     * @return void
     */
    public function all();
    
    /**
     * Find data by id.
     *
     * @param number $id      id.
     * @param arrary $columns columns.
     *
     * @return data
     */
    public function find($id, $columns = ['*']);

    /**
     * Retrieve data with paginate
     *
     * @param number $limit   limit
     * @param arrary $columns columns
     *
     * @return data with paginate
     */
    public function paginate($limit = null, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     * @param array $input input
     *
     * @return void
     */
    public function store(array $input);

    /**
     * Update a entity in repository
     *
     * @param arrary $input input
     * @param number $id    id
     *
     * @return void
     */
    public function update(array $input, $id);
    
    /**
     * Destroy a entity in repository
     *
     * @param number $id id
     *
     * @return void
     */
    public function destroy($id);
}
