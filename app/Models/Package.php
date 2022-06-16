<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "order_id",
        "hub_id",
        "delivery_agent_id",
        "package_number",
        "payment_status",
        "pickup_address",
        "shipping_address",
        "is_picked_up",
        "is_delivered",
        "is_fragile"
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }
    public function delivery_agent()
    {
        return $this->belongsTo(User::class);
    }
}
