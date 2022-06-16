<?php

namespace Bootstrap\Helpers;

use App\Models\Franchise;
use App\Models\FranchiseCart;

class CartHelper
{
    public static function test()
    {
        return "pass";
    }

    public static function total_items()
    {
        $franchise = Franchise::select('id')->where('manager_id', auth()->id())->firstOrFail();
        return FranchiseCart::where('franchise_id', $franchise->id)->where('franchise_buyer_id', auth()->id())->count();
    }
}
