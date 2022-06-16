<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FranchiseProduct extends Model
{
    use HasFactory, URLbyUUID;

    protected $guarded = [];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
