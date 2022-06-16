<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellerTransaction;
use App\Models\SellerWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SellerWalletController extends Controller
{
    public function index()
    {
        return view("admin.wallets.sellers.list", [
            "wallets" => SellerWallet::all()
        ]);
    }


    public function show(SellerWallet $wallet)
    {
        return view("admin.wallets.sellers.show", [
            "wallet" => $wallet
        ]);
    }

    public function payoff(SellerWallet $wallet)
    {
        if ($wallet->current_earnings <= 0) {
            Session::flash('danger', 'Unable to proceed!!');
            return back();
        }

        $amount = $wallet->current_earnings;
        $wallet->current_earnings = 0;
        $wallet->save();

        SellerTransaction::create([
            "wallet_id" => $wallet->id,
            "transaction_number" => strtoupper("TRN-" . Str::random(6)),
            "status" => "pending",
            "state" => "debit",
            "amount" => $amount,
            "for" => "payoff"
        ]);

        Session::flash('info', 'Seller Paid Off Successfully');
        return back();
    }


    public function edit(SellerWallet $wallet)
    {
        return view('admin.wallets.sellers.edit', [
            "wallet" => $wallet
        ]);
    }

    public function update(Request $request, SellerWallet $wallet)
    {
        $wallet->status = $request->status ? 1 : 0;
        $wallet->save();

        Session::flash('info', 'Seller Wallet Info Updated Successfully');
        return back();
    }
}
