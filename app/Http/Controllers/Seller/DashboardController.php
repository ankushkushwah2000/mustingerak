<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $user->load("role");

        $mutable = Carbon::now();
        $updatedAgo = $mutable->subtract(1, 'minutes')->diffForHumans();

        return view("seller.dashboard", [
            "user" => $user,
            "updatedAgo" => $updatedAgo,
            "sales_count" => Order::whereHas("products", function ($q) use ($user) {
                $q->where("seller_id", $user->id);
            })->count() * 0
        ]);
    }
}
