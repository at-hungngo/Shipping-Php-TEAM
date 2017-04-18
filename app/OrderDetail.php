<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'price_bid', 'weight', 'reciver_name', 'reciver_phone',
        'reciver_address', 'longitude_start', 'longitude_end', 'status', 'latitude_start' ,'latitude_end',
        'status', 'id', 'order_id'
    ];

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
