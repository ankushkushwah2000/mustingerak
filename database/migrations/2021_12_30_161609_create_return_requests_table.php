<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReturnRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->string("request_number")->unique();
            $table->foreignId("customer_id")->constrained("users", "id");
            $table->foreignId("order_id")->constrained("orders", "id");
            $table->text("message")->nullable();
            $table->enum("status", ["pending", "processing", "declined", "processed"])->default("pending");

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
        Schema::dropIfExists('return_requests');
    }
}
