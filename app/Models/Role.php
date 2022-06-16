<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory, URLbyUUID;

    public const IS_ADMIN = 1;
    public const IS_SELLER = 2;
    public const IS_AGENT = 3;
    public const IS_CUSTOMER = 4;
    public const IS_HUB_MANAGER = 5;
    public const IS_DELIVERY_AGENT = 6;
    public const IS_FRANCHISE_MANAGER = 7;
    public const IS_FRANCHISE_STAFF = 8;
}
