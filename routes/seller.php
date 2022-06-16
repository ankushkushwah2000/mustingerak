<?php

/* Seller routes */

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "seller", "middleware" => ["isSeller", "auth", "PreventBackHistory"], "as" => "seller."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\Seller\DashboardController::class, "dashboard"])->name("dashboard");
    Route::post("/product/images/delete/{productImage}", [\App\Http\Controllers\Seller\ProductController::class, "productImageDestroy"])->name("product.images.delete");
    Route::resource("/products", \App\Http\Controllers\Seller\ProductController::class);
    /*seller Profile */
    Route::get("/profile", [\App\Http\Controllers\Seller\ProfileController::class, "index"])->name("profile.index");
    Route::post("/profile/save", [\App\Http\Controllers\Seller\ProfileController::class, "save"])->name("profile.save");

    /* Seller Wallet */
    Route::get("/wallet", [\App\Http\Controllers\Seller\WalletController::class, "index"])->name("wallet.index");

    /* Seller orders */
    Route::resource("/orders", \App\Http\Controllers\Seller\OrderController::class);
});
