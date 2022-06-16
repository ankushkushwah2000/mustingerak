<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\SellerWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {

        $sellerWallet = SellerWallet::where("seller_id", auth()->id())->firstOrNew();

        if (!$sellerWallet->exists) {
            SellerWallet::create([
                "seller_id" => auth()->id(),
                "total_earnings" => 0,
                "current_earnings" => 0,
                "status" => 0,
            ]);
        }
        return view("seller.wallet", [
            "wallet" => $sellerWallet
        ]);
    }
}
