<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, URLbyUUID;

    protected $fillable = [
        "category_id",
        "title",
        "slug",
        "description",
        "image",
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
        return $this->belongsTo(Category::class);
    }
}
