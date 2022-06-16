<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hub extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "user_id",
        "hub_number",
        "image",
        "country_id",
        "state_id",
        "city",
        "postcode",
        "address",
        "status"
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }

    public function state()
    {
        return $this->belongsTo(State::class, "state_id");
    }

    public function imgSrc($value = "")
    {
        return asset("/storage/" . $value);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, "hub_orders");
    }

    // public function delivery_agents()
    // {
    //     return $this->hasMany(DeliveryAgentProfile::class);
    // }
    public function delivery_agents()
    {
        return User::where("role_id", Role::IS_DELIVERY_AGENT)->with("deliveryAgentProfile")->whereHas('deliveryAgentProfile', function ($q) {
            $q->where('hub_id', '=', $this->id);
        })->get();
    }

    public function name()
    {
        return $this->hub_number . "-" . $this->state->name . "-" . $this->city . "-" . $this->postcode;
    }
}
