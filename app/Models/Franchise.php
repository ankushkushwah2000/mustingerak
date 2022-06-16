<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Franchise extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $guarded = [];

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
        return $this->belongsTo(User::class, "manager_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'franchise_products')->withTimestamps()->withPivot('quantity', 'discount', 'created_at');
    }

    /* Supporting methods */
    // public function products()
    // {
    //     return FranchiseProduct::where('franchise_id', $this->id)->get();
    // }

    public function unique_name()
    {
        return $this->franchise_number . "-" . $this->state->name . "-" . $this->city . "-" . $this->postcode;
    }
}
