<?php

use Illuminate\Support\Facades\Route;

/* Admin routes */


Route::group(["prefix" => "admin", "middleware" => ["isAdmin", "auth", "PreventBackHistory"], "as" => "admin."], function () {
    Route::get("/dashboard", [\App\Http\Controllers\Admin\DashboardController::class, "dashboard"])->name("dashboard");

    /*admin Profile */
    Route::get("/profile", [\App\Http\Controllers\Admin\ProfileController::class, "index"])->name("profile.index");
    Route::post("/profile/save", [\App\Http\Controllers\Admin\ProfileController::class, "save"])->name("profile.save");

    Route::resource("/users", \App\Http\Controllers\Admin\UserController::class);
    Route::resource("/users/sellers", \App\Http\Controllers\Admin\SellerController::class);
    Route::resource("/users/customers", \App\Http\Controllers\Admin\CustomerController::class);
    Route::post("/product/images/delete/{productImage}", [\App\Http\Controllers\Admin\ProductController::class, "productImageDestroy"])->name("product.images.delete");
    Route::resource("/products", \App\Http\Controllers\Admin\ProductController::class);
    Route::resource("/categories", \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource("/subcategories", \App\Http\Controllers\Admin\SubCategoryController::class);
    Route::resource("/subsubcategories", \App\Http\Controllers\Admin\SubSubCategoryController::class);
    Route::resource("/orders", \App\Http\Controllers\Admin\OrderController::class);
    Route::resource("/return_requests", \App\Http\Controllers\Admin\ReturnRequestController::class);
    Route::resource("/seller_requests", \App\Http\Controllers\Admin\SellerRequestController::class);
    Route::resource("/hubs", \App\Http\Controllers\Admin\HubController::class);
    Route::resource("/franchises", \App\Http\Controllers\Admin\FranchiseController::class);
    Route::resource("/franchises_products", \App\Http\Controllers\Admin\FranchiseProductController::class);
    Route::get('/franchises_orders', [\App\Http\Controllers\Admin\FranchiseOrderController::class, 'index'])->name('franchises_orders.index');
    Route::get('/franchises_orders/show/{franchiseOrder}', [\App\Http\Controllers\Admin\FranchiseOrderController::class, 'show'])->name('franchises_orders.show');
    // Route::get("/franchises_products/q/{franchise}", [\App\Http\Controllers\Admin\FranchiseProductController::class, 'index'])->name('franchises_products.index');
    Route::resource("/brands", \App\Http\Controllers\Admin\BrandController::class);
    Route::resource("/pages", \App\Http\Controllers\Admin\PageController::class);
    Route::get("/states", [\App\Http\Controllers\Admin\GeoController::class, "states"])->name("geo.states");

    /* Gateway */
    Route::get("/gateways/razorpay", [\App\Http\Controllers\Admin\RazorpayConfigController::class, "index"])->name("gateway.razorpay");
    Route::put("/gateways/razorpay/{razorpayConfig}", [\App\Http\Controllers\Admin\RazorpayConfigController::class, "update"])->name("gateway.razorpay.update");

    /* Settings */
    Route::get("/settings/frontend", [\App\Http\Controllers\Admin\FrontendSettingController::class, "index"])->name("settings.frontend");
    Route::put("/settings/frontend/{frontendSetting}", [\App\Http\Controllers\Admin\FrontendSettingController::class, "update"])->name("settings.frontend.update");


    /* Pass order to hub */
    Route::resource("/hub_orders", \App\Http\Controllers\Admin\HubOrderController::class);
    /* Packages */
    Route::resource("/packages", \App\Http\Controllers\Admin\PackageController::class);

    /* Teams */
    Route::resource("/teams", \App\Http\Controllers\Admin\TeamController::class);
    /* Banners */
    Route::resource("/banners", \App\Http\Controllers\Admin\BannerController::class);
    /* Banners */
    Route::resource("/donation_posts", \App\Http\Controllers\Admin\DonationPostController::class);
    /* Statuses */
    Route::resource("/statuses", \App\Http\Controllers\Admin\StatusesController::class);
    /* coupons */
    Route::resource("/coupons", \App\Http\Controllers\Admin\CouponController::class);
    /* enquiries */
    Route::resource("/enquiries", \App\Http\Controllers\Admin\EnquiryController::class);
    /* reviews */
    Route::resource("/reviews", \App\Http\Controllers\Admin\ReviewController::class);

    /* Wallets */
    Route::get("/wallets/sellers", [\App\Http\Controllers\Admin\SellerWalletController::class, "index"])->name("wallets.sellers.index");
    Route::get("/wallets/sellers/{wallet}/show", [\App\Http\Controllers\Admin\SellerWalletController::class, "show"])->name("wallets.sellers.show");
    Route::get("/wallets/sellers/{wallet}/edit", [\App\Http\Controllers\Admin\SellerWalletController::class, "edit"])->name("wallets.sellers.edit");
    Route::put("/wallets/sellers/{wallet}/update", [\App\Http\Controllers\Admin\SellerWalletController::class, "update"])->name("wallets.sellers.update");

    Route::put("/wallets/sellers/{wallet}/payoff", [\App\Http\Controllers\Admin\SellerWalletController::class, "payoff"])->name("wallets.sellers.payoff");
});
