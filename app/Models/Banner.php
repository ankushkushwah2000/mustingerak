<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "title",
        "sub_title",
        "selling_price",
        "price",
        "category_id",
        "status",
        "image"
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
}
