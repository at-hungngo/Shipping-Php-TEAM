<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Order;

class OrderRepository extends BaseRepository
{
    /**
     * Make model
     *
     * @return void
     */
    public function model()
    {
        return Order::class;
    }
}
