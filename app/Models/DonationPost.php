<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationPost extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "user_id",
        "image",
        "title",
        "excerpt",
        "amount",
        "link",
        "content",
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

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
