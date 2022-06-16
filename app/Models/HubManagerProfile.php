<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HubManagerProfile extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "user_id",
        "image",
        "country_id",
        "state_id",
        "city",
        "gst_number",
        "postcode",
        "address",
        "alt_phone",
    ];

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
}
