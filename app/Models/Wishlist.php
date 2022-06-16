<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory, URLbyUUID;
}
