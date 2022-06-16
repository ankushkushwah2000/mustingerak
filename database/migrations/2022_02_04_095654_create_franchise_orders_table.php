<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->foreignId("franchise_id")->constrained('franchises', 'id');
            $table->foreignId("customer_id")->constrained('users', 'id');
            $table->string("order_number")->unique();
            $table->string("b_first_name");
            $table->string("b_last_name");
            $table->string("b_phone");
            $table->string("b_email");
            $table->string("b_company_name")->nullable();
            $table->unsignedBigInteger("b_country_id")->default(1);
            $table->unsignedBigInteger("b_state_id");
            $table->string("b_city");
            $table->text("b_address_line");
            $table->text("b_address_line_2")->nullable();
            $table->string("b_postcode");

            $table->text("note")->nullable();

            $table->string("payment_method");
            $table->string("payment_status")->default("unpaid");

            $table->float("total_amount");
            $table->boolean("complete")->default(0);

            $table->foreign('b_country_id')->references('id')->on('countries');
            $table->foreign('b_state_id')->references("id")->on("states");

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
        Schema::dropIfExists('franchise_orders');
    }
}
