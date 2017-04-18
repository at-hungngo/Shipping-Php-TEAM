<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Bid;

class BidRepository extends BaseRepository
{

    /**
     * Make model
     *
     * @return void
     */
    public function model()
    {
        return Bid::class;
    }
}
