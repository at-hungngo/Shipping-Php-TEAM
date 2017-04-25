<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Role;
use App\Bid;
use App\Order;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'shipper_id', 'id'
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
