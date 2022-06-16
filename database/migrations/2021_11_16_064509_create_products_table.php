<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger('seller_id');
            $table->string("title");
            $table->string("slug");
            $table->text("summary");
            $table->text("description");
            $table->text("key_features");
            $table->text("features");
            $table->string("legal_disclaimer");
            $table->string("condition");
            $table->text("condition_note");
            $table->float("mrp");
            $table->float("price");
            $table->float("selling_price");
            $table->double("gst");
            $table->string("manufacture");
            $table->string("country");
            $table->text("box_content");
            $table->text("warranty");
            $table->integer("quantity");
            $table->integer("maximum_order_quantity");
            $table->string("model");
            $table->string("pin_code");
            $table->string("hsn");
            $table->string("sku");
            $table->text("image");

            $table->boolean("status")->default(false);
            $table->boolean("in_stock")->default(false);
            $table->boolean("cod_enable")->default(false);
            $table->boolean("is_popular")->default(false);
            $table->boolean("is_featured")->default(false);
            $table->boolean("is_gift_wrap_available")->default(false);

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('sub_sub_category_id');

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('sub_sub_category_id')->references('id')->on('sub_sub_categories');

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
        Schema::dropIfExists('products');
    }
}
