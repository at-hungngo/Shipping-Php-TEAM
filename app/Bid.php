<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Role;
use App\Bid;
use App\Order;

class Bid extends Model
{
    use SoftDeletes;

    protected $table = 'bids';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'price_bid', 'user_id', 'order_id', 'id'
    ];

    /**
     * Shipper
     *
     * @return shipper
     */
    public function shipper()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Order
     *
     * @return order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
