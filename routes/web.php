<?php

use App\Http\Controllers\Admin\HubOrderController;
use App\Http\Controllers\frontendController;
use App\Models\Role;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->role_id) {
        case Role::IS_ADMIN:
            /* Admin */
            return redirect()->route("admin.dashboard");
            break;

        case Role::IS_SELLER:
            /* Seller */
            return redirect()->route("seller.dashboard");
            break;

        case Role::IS_HUB_MANAGER:
            /* manger */
            return redirect()->route("hub_manager.dashboard");
            break;

        case Role::IS_DELIVERY_AGENT:
            /* manger */
            return redirect()->route("delivery_agent.dashboard");
            break;

        case Role::IS_FRANCHISE_MANAGER:
            /* franchise_manager  */
            return redirect()->route("franchise_manager.dashboard");
            break;

        case Role::IS_FRANCHISE_STAFF:
            /* franchise_staff  */
            return redirect()->route("franchise_staff.dashboard");
            break;

        default:
            return view('dashboard');
            break;
    }
})->middleware(['auth'])->name('dashboard');

/* Global Routes */

Route::post("/global/invoice/{order}/genrate", [\App\Http\Controllers\Global\InvoiceController::class, "genrate"])->name("invoice.genrate");
Route::post("/global/invoice/{order}/show", [\App\Http\Controllers\Global\InvoiceController::class, "show"])->name("invoice.show");
Route::delete("/global/invoice/{order}/delete", [\App\Http\Controllers\Global\InvoiceController::class, "delete"])->name("invoice.delete");
Route::put("/global/order/{order}/status/update", [\App\Http\Controllers\Global\OrderStatusController::class, "update"])->name("order.status.update");

Route::post("/global/franchises_invoice/{order}/genrate", [\App\Http\Controllers\Global\FranchiseInvoiceController::class, "genrate"])->name("franchises_invoice.genrate");
Route::post("/global/franchises_invoice/{order}/show", [\App\Http\Controllers\Global\FranchiseInvoiceController::class, "show"])->name("franchises_invoice.show");
Route::delete("/global/franchises_invoice/{order}/delete", [\App\Http\Controllers\Global\FranchiseInvoiceController::class, "delete"])->name("franchises_invoice.delete");

//frontendController
Route::get('/',[frontendController::class,'index']);
Route::get('frontend/track_order',[frontendController::class,'track_order']);
Route::get('frontend/about',[frontendController::class,'about']);
Route::get('frontend/contact',[frontendController::class,'contact']);
Route::get('singal_product/{id}',[frontendController::class,'singal_product']);
Route::get('cart',[frontendController::class,'cart']);
Route::post('add_to_cart',[frontendController::class,'add_to_cart']);
Route::post('delete_from_cart',[frontendController::class,'delete_from_cart'])->name('delete_from_cart');
Route::get('/checkout',[frontendController::class,'check_out'])->name('checkout');

//search
Route::get('search',[frontendController::class,'search'])->name('search');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/seller.php';
require __DIR__ . '/hub_manager.php';
require __DIR__ . '/delivery_agent.php';
require __DIR__ . '/franchise_manager.php';
require __DIR__ . '/franchise_store.php';
require __DIR__ . '/franchise_staff.php';
