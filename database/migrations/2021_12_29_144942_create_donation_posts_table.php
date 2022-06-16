<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDonationPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_posts', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->foreignId("user_id")->constrained("users");
            $table->string("title");
            $table->text("excerpt")->nullable();
            $table->float("amount")->nullable();
            $table->string("link")->nullable();
            $table->longText("content")->nullable();
            $table->text("image");
            $table->boolean("status")->default(false);
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
        Schema::dropIfExists('donation_posts');
    }
}
