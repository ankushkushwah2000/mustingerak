<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, URLbyUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        "phone",
        'password',
        'role_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    function profile()
    {
        switch ($this->role_id) {
            case Role::IS_ADMIN:
                return $this->hasOne(AdminProfile::class);
                break;

            case Role::IS_SELLER:
                return $this->hasOne(SellerProfile::class);
                break;

            case Role::IS_HUB_MANAGER:
                return $this->hasOne(HubManagerProfile::class);
                break;

            case Role::IS_DELIVERY_AGENT:
                return $this->hasOne(DeliveryAgentProfile::class);
                break;

            case Role::IS_FRANCHISE_MANAGER:
                return $this->hasOne(FranchiseManagerProfile::class);
                break;

            case Role::IS_FRANCHISE_STAFF:
                return $this->hasOne(FranchiseStaffProfile::class);
                break;

            default:
                return $this->hasOne(Profile::class);
                break;
        }
    }

    public function deliveryAgentProfile()
    {
        return $this->hasOne(DeliveryAgentProfile::class);
    }

    public function franchiseStaffProfile()
    {
        return $this->hasOne(FranchiseStaffProfile::class);
    }

    public function sellerProfile()
    {
        return $this->hasOne(SellerProfile::class);
    }

    function wallet()
    {
        switch ($this->role_id) {
            case Role::IS_ADMIN:
                return $this->hasOne(SellerWallet::class, "seller_id");
                break;

            case Role::IS_SELLER:
                return $this->hasOne(SellerWallet::class, "seller_id");
                break;

            default:
                return null;
                break;
        }
    }

    public function products()
    {
        return $this->hasMany(Product::class, "seller_id");
    }

    public function franchise()
    {

        switch ($this->role_id) {
            case Role::IS_FRANCHISE_MANAGER:
                return Franchise::where('manager_id', $this->id)->first();
                break;

            case Role::IS_FRANCHISE_STAFF:
                return $this->franchiseStaffProfile->franchise;
                break;

            default:
                return null;
                break;
        }
    }
}
