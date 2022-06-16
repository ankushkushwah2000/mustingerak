<?php

use Illuminate\Support\Facades\Route;

/* delivery_agent routes */

Route::group(["prefix" => "delivery_agent", "middleware" => ["isDeliveryAgent", "auth", "PreventBackHistory"], "as" => "delivery_agent."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\DeliveryAgent\DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/profile", [\App\Http\Controllers\DeliveryAgent\ProfileController::class, "index"])->name("profile.index");
    Route::resource('/packages', \App\Http\Controllers\DeliveryAgent\PackageController::class);
});
