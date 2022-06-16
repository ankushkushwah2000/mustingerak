<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrontendSetting extends Model
{
    use HasFactory, URLbyUUID;

    protected $fillable = [
        "logo",
        "favicon",
        "title",
        "meta_description",
        "meta_keywords",
        "email",
        "phone",
        "alt_phone",
        "address_line",
        "footer_copyright",
        "gst_number",
        "licence",
        "app_store",
        "show_app_store",
        "play_store",
        "show_play_store",
        "facebook",
        "instagram",
        "twitter",
        "youtube",
    ];
}
