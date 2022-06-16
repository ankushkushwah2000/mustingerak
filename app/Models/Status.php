<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    public const IS_PENDING = 1;
    public const IS_DELIVERED  = 5;
    public const IS_CANCEL = 6;

    protected $fillable = [
        "title",
        "description",
        "status",
        "admin",
        "seller",
        "agent",
        "customer",
        "hub_manager",
        "delivery_agent",
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
