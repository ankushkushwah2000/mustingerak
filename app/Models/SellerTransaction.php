<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerTransaction extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "wallet_id",
        "transaction_number",
        "status",
        "state",
        "amount",
        "for"
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }
}
