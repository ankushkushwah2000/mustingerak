<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->string("franchise_number")->unique();
            $table->foreignId('manager_id')->constrained('users', 'id');
            $table->string("name")->unique();
            $table->string("email")->unique();
            $table->string("phone")->unique();
            $table->text("image")->nullable();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->string("city");
            $table->text("address");
            $table->string("postcode");
            $table->boolean("status")->default(0);
            $table->unique(["manager_id", "franchise_number"]);

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
        Schema::dropIfExists('franchises');
    }
}
