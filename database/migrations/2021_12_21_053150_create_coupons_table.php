<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("brand_id")->nullable();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();

            $table->string("title");
            $table->string("code")->unique();
            $table->enum("type", ['fixed', 'percentage'])->default("fixed");

            $table->float("value")->default(0);
            $table->float("maximum_discount")->default(0);

            $table->integer("maximum_uses")->default(0);
            $table->integer("number_of_uses")->default(0);
            $table->integer("recurring")->default(0);

            $table->boolean("apply_once")->default(false);
            $table->boolean("status")->default(false);

            $table->foreign("brand_id")->references("id")->on("brands");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("category_id")->references("id")->on("categories");

            $table->dateTime("started_at");
            $table->dateTime("expired_at");
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
        Schema::dropIfExists('coupons');
    }
}
