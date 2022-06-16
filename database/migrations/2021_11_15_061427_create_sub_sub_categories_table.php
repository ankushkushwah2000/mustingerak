<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger('sub_category_id');
            $table->string("title");
            $table->string("slug");
            $table->text("description")->nullable();
            $table->decimal("pv");
            $table->decimal("referral_fee");
            $table->decimal("closing_fee");
            $table->text("image")->nullable();
            $table->boolean("status");

            $table->foreign('sub_category_id')->references('id')->on('sub_categories');

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
        Schema::dropIfExists('sub_sub_categories');
    }
}
