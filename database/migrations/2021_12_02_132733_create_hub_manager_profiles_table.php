<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHubManagerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_manager_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("user_id")->unique();
            $table->text("image")->nullable();
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("state_id");
            $table->string("city");
            $table->text("address");
            $table->string("postcode");
            $table->string("gst_number")->nullable();
            $table->string('alt_phone')->nullable()->unique();

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
        Schema::dropIfExists('hub_manager_profiles');
    }
}
