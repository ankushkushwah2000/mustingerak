<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->unique();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("phone");
            $table->string("email")->unique();
            $table->string("company_name")->nullable();
            $table->unsignedBigInteger("country_id")->default(1);
            $table->unsignedBigInteger("state_id")->default(1);
            $table->string("city");
            $table->text("address_line");
            $table->text("address_line_2")->nullable();
            $table->string("postcode");

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references("id")->on("states");

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
        Schema::dropIfExists('billing_addresses');
    }
}
