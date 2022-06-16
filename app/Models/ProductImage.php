<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, URLbyUUID;

    protected $fillable = [
        "product_id",
        "path",
    ];

    public function getPathAttribute($value)
    {
        return asset("/storage/" . $value);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
