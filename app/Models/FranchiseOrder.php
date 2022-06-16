<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseOrder extends Model
{
    use HasFactory, URLbyUUID;

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function b_state()
    {
        return $this->belongsTo(State::class, "b_state_id");
    }

    public function b_country()
    {
        return $this->belongsTo(Country::class, "b_country_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "franchise_order_products")->withPivot("quantity", "discount");
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }
}
