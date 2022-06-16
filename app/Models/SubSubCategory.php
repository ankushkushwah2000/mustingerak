<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory, URLbyUUID;

    protected $fillable = [
        "category_id",
        "sub_category_id",
        "title",
        "slug",
        "description",
        "image",
        "pv",
        "referral_fee",
        "closing_fee",
        "status",
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    function category()
    {
        return SubCategory::find($this->sub_category_id)->category;
    }

    function subcategory()
    {
        return $this->belongsTo(SubCategory::class, "sub_category_id");
    }
}
