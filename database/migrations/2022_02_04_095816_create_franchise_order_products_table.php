<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_order_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId("franchise_order_id")->constrained();
            $table->foreignId("product_id")->constrained();
            $table->integer("quantity")->default(1);
            $table->float("discount")->default(0);

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
        Schema::dropIfExists('franchise_order_products');
    }
}
