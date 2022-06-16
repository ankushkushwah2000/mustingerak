<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerWallet extends Model
{

    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "seller_id",
        "total_earnings",
        "current_earnings",
        "status",
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, "seller_id");
    }

    public function transactions()
    {
        return $this->hasMany(SellerTransaction::class, "wallet_id");
    }
}
