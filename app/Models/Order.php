<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Order extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;

    protected $fillable = [
        "user_id",
        "bulk_order_number",
        "order_number",
        "b_first_name",
        "b_last_name",
        "b_company_name",
        "b_address_line",
        "b_address_line_2",
        "b_country_id",
        "b_state_id",
        "b_city",
        "b_postcode",
        "b_phone",
        "b_email",
        "s_first_name",
        "s_last_name",
        "s_company_name",
        "s_address_line",
        "s_address_line_2",
        "s_country_id",
        "s_state_id",
        "s_city",
        "s_postcode",
        "s_phone",
        "s_email",
        "note",
        "payment_method",
        "payment_status",
        "total_amount"
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }


    public function getPaymentStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "order_products")->withPivot("quantity", "discount");
    }

    public function s_country()
    {
        return $this->belongsTo(Country::class, "s_country_id");
    }

    public function b_country()
    {
        return $this->belongsTo(Country::class, "b_country_id");
    }

    public function s_state()
    {
        return $this->belongsTo(State::class, "s_state_id");
    }

    public function b_state()
    {
        return $this->belongsTo(State::class, "b_state_id");
    }

    public function hub()
    {
        return $this->belongsToMany(Hub::class, "hub_orders");
    }


    public function statuses()
    {
        // return $this->belongsToMany(Status::class)->withTimestamps()->latest();
        return $this->belongsToMany(Status::class)->withTimestamps()->orderBy('order_status.created_at', "desc");
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function returnRequest()
    {
        return $this->hasOne(ReturnRequest::class);
    }

    public function package()
    {
        return $this->hasOne(Package::class);
    }

    /* Support Methods */

    public function canCancel()
    {
        if ($this->status_id !== Status::IS_PENDING) {
            return false;
        }
        return true;
    }

    public function canReturn()
    {
        if ($this->status_id == Status::IS_DELIVERED && !$this->returnRequest) {
            return true;
        }
        return false;
    }
}
