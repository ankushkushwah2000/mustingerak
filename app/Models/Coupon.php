<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "brand_id",
        "product_id",
        "category_id",
        "title",
        "code",
        "value",
        "type",
        "maximum_discount",
        "maximum_uses",
        "recurring",
        "apply_once",
        "status",
        "started_at",
        "expired_at",
    ];



    public function getExpiredAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /* 
    111
    100
    101
    001
    010
    110
    011
    000
    */

    public function for()
    {
        if ($this->brand_id == null && $this->product_id == null && $this->category_id == null) {
            return "all";
        }
        if ($this->brand_id == null && $this->product_id == null && $this->category_id) {
            return "category";
        }
        if ($this->brand_id && $this->product_id == null && $this->category_id == null) {
            return "brand";
        }
        if ($this->brand_id == null && $this->product_id && $this->category_id == null) {
            return "product";
        }
    }
}
