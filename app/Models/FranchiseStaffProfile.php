<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseStaffProfile extends Model
{
    use HasFactory, URLbyUUID;

    protected $guarded = [];

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

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }
}
