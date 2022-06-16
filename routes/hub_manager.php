<?php


/* hub_manager routes */

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "hub_manager", "middleware" => ["isHubManager", "auth", "PreventBackHistory"], "as" => "hub_manager."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\HubManager\DashboardController::class, "dashboard"])->name("dashboard");

    /*hub_manager Profile */
    Route::get("/profile", [\App\Http\Controllers\HubManager\ProfileController::class, "index"])->name("profile.index");
    Route::post("/profile/save", [\App\Http\Controllers\HubManager\ProfileController::class, "save"])->name("profile.save");

    Route::get("/hub", [\App\Http\Controllers\HubManager\HubController::class, "index"])->name("hub.index");
    Route::post("/hub", [\App\Http\Controllers\HubManager\HubController::class, "save"])->name("hub.save");

    Route::resource("/orders", \App\Http\Controllers\HubManager\OrderController::class);
    Route::resource("/delivery_agents", \App\Http\Controllers\HubManager\DeliveryAgentController::class);
    Route::resource("/packages", \App\Http\Controllers\HubManager\PackageController::class);
});
