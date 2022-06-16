<?php


/* franchise_staff routes */

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "franchise_staff", "middleware" => ["isFranchiseStaff", "auth", "PreventBackHistory"], "as" => "franchise_staff."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\FranchiseStaff\DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/profile", [\App\Http\Controllers\FranchiseStaff\ProfileController::class, "index"])->name("profile.index");
});
