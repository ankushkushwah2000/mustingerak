<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->string("title");
            $table->string("description")->nullable();

            $table->boolean("status")->default(false);

            $table->boolean("admin")->default(true);
            $table->boolean("seller")->default(false);
            $table->boolean("agent")->default(false);
            $table->boolean("customer")->default(false);
            $table->boolean("hub_manager")->default(false);
            $table->boolean("delivery_agent")->default(false);
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
        Schema::dropIfExists('statuses');
    }
}
