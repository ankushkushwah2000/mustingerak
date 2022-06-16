<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    // public function getPriceAttribute($value)
    // {
    //     return number_format($value, 2);
    // }
    // public function getSellingPriceAttribute($value)
    // {
    //     return number_format($value, 2);
    // }

    public function seller()
    {
        return $this->belongsTo(User::class, "seller_id");
    }

    // public function category()
    // {
    //     return $this->hasOne(Category::class);
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function video()
    {
        return $this->hasMany(video::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
