<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAgentProfile extends Model
{
    use HasFactory, URLbyUUID;

    protected $fillable = [
        "hub_id",
        "user_id",
        "image",
        "alt_phone",
        "country_id",
        "state_id",
        "city",
        "address",
        "postcode",
        "aadhar_number",
        "id_proof",
        "driving_licence",
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
