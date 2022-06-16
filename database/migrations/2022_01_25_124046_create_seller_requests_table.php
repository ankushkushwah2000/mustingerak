<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->string("request_number")->unique();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
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
        Schema::dropIfExists('seller_requests');
    }
}
