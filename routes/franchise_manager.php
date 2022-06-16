<?php


/* franchise_manager routes */

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "franchise_manager", "middleware" => ["isFranchiseManager", "auth", "PreventBackHistory"], "as" => "franchise_manager."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\FranchiseManager\DashboardController::class, "dashboard"])->name("dashboard");

    /*franchise_manager Profile */
    Route::get("/profile", [\App\Http\Controllers\FranchiseManager\ProfileController::class, "index"])->name("profile.index");
    Route::post("/profile/save", [\App\Http\Controllers\FranchiseManager\ProfileController::class, "save"])->name("profile.save");

    Route::get("/franchise", [\App\Http\Controllers\FranchiseManager\FranchiseController::class, "index"])->name("franchise.index");
    Route::post("/franchise", [\App\Http\Controllers\FranchiseManager\FranchiseController::class, "save"])->name("franchise.save");
    Route::resource("/products", \App\Http\Controllers\FranchiseManager\FranchiseProductController::class)->only('index');

    /* Staff */
    Route::resource("/staff_members", \App\Http\Controllers\FranchiseManager\FranchiseStaffController::class);
});
