<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Bid;
use App\Order;

class Order extends Model
{
    protected $table = 'orders';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price_bid', 'weight',
        'reciver_name', 'reciver_phone', 'reciver_address', 'lnglat_start', 'lnglat_end', 'status',
        'status', 'user_id', 'shipper_id', 'id'
    ];

    /**
     * Shipper
     *
     * @return shipper
     */
    public function shipper()
    {
        return $this->belongsTo(User::class, 'shipper_id', 'id');
    }

    /**
     * Owner
     *
     * @return owner
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Bids
     *
     * @return bids
     */
    public function bids()
    {
        return $this->hasMany(Bid::class, 'order_id', 'id');
    }
}
