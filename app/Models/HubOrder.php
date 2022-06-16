<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HubOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "hub_id",
        "order_id"
    ];
}
