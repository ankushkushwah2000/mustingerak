<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("hub_id");
            $table->unsignedBigInteger("order_id")->unique();

            $table->foreign("hub_id")->references("id")->on("hubs");
            $table->foreign("order_id")->references("id")->on("orders");

            $table->string("status")->default("in process");

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
        Schema::dropIfExists('hub_orders');
    }
}
