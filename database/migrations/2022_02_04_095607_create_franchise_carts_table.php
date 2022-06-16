<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_carts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('franchise_id')->constrained('franchises', "id");
            $table->foreignId('franchise_buyer_id')->constrained('users', "id");
            $table->foreignId('customer_id')->constrained('users', "id");
            $table->foreignId('product_id')->constrained();
            $table->integer("quantity")->default(1);
            // $table->unsignedBigInteger('coupon_id')->nullable();
            $table->float("discount")->default(0);

            // $table->foreign('coupon_id')->references('id')->on('coupons');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('franchise_carts');
    }
}
