<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FranchiseManagerProfile extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

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
}
