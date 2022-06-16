<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "product_id",
        "title",
        "video",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
