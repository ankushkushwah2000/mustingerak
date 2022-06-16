<?php


/* franchise_store routes */

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "franchise_store", "middleware" => ["auth", "isFranchiseManagerOrStaff", "PreventBackHistory"], "as" => "franchise_store."], function () {
    /* Store */
    Route::get('/store', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'index'])->name('store.index');
    Route::get('/store/product/{product}', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'product'])->name('store.product');
    Route::post('/store/addtocart/{product}', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'addToCart'])->name('store.addtocart');
    Route::post('/store/removefromcart/{franchiseCart}', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'removeFromCart'])->name('store.removefromcart');
    Route::get('/store/cart', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'cart'])->name('store.cart');
    Route::get('/orders', [\App\Http\Controllers\FranchiseStore\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/show/{franchiseOrder}', [\App\Http\Controllers\FranchiseStore\OrderController::class, 'show'])->name('orders.show');
    Route::get('/store/order/create', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'orderCreate'])->name('store.order.create');
    Route::post('/store/order/place', [\App\Http\Controllers\FranchiseStore\StoreController::class, 'orderStore'])->name('store.order.store');
    Route::post('/razorpay/payment', [\App\Http\Controllers\FranchiseStore\RazorpayController::class, "payment"])->name("razorpay.payment");
});
