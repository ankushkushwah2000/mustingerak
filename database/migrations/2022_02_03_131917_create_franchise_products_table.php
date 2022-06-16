<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_products', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->foreignId('franchise_id')->constrained();
            $table->foreignId('product_id')->constrained();
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
        Schema::dropIfExists('franchise_products');
    }
}
