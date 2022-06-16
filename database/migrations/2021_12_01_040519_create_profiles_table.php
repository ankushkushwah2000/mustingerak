<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->unique();
            $table->text("image")->nullable();
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("state_id");
            $table->string("city");
            $table->text("address");
            $table->string("postcode");
            $table->string("gst_number")->nullable();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("country_id")->references("id")->on("countries");
            $table->foreign("state_id")->references("id")->on("states");

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
        Schema::dropIfExists('profiles');
    }
}
