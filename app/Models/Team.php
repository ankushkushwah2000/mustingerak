<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "image",
        "name",
        "role",
        "instagram",
        "facebook",
        "twitter",
        "google_plus",
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

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
