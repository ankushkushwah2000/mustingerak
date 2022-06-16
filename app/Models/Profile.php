<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "image",
        "country_id",
        "state_id",
        "city",
        "gst_number",
        "postcode",
        "address",
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
