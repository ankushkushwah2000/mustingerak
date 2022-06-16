<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("user_id");
            $table->string("hub_number")->unique();
            $table->text("image")->nullable();
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("state_id");
            $table->string("city");
            $table->text("address");
            $table->string("postcode");
            $table->boolean("status")->default(0);

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("country_id")->references("id")->on("countries");
            $table->foreign("state_id")->references("id")->on("states");
            $table->unique(["user_id", "hub_number"]);

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
        Schema::dropIfExists('hubs');
    }
}
