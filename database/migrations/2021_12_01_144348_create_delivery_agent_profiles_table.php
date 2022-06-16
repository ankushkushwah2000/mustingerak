<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAgentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_agent_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("user_id")->unique();
            $table->unsignedBigInteger("hub_id");
            $table->text("image")->nullable();
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("state_id");
            $table->string("city");
            $table->text("address");
            $table->string("postcode");

            $table->text("id_proof");
            $table->text("driving_licence");
            $table->string("aadhar_number");
            $table->string('alt_phone')->nullable()->unique();


            $table->foreign("hub_id")->references("id")->on("hubs");
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
        Schema::dropIfExists('delivery_agent_profiles');
    }
}
