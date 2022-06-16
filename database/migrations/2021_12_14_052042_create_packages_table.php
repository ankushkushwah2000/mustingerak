<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("hub_id");
            $table->unsignedBigInteger("delivery_agent_id");
            $table->string("package_number")->unique();
            $table->string("payment_status");
            $table->text("pickup_address");
            $table->text("shipping_address");

            $table->boolean("is_picked_up")->default(false);
            $table->boolean("is_delivered")->default(false);
            $table->boolean("is_fragile")->default(false);


            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("hub_id")->references("id")->on("hubs");
            $table->foreign("delivery_agent_id")->references("id")->on("users");

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
        Schema::dropIfExists('packages');
    }
}
