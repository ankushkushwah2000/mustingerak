<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFrontendSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_settings', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->text("logo")->nullable();
            $table->text("favicon")->nullable();
            $table->string("title")->nullable();
            $table->text("meta_description")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->text('address_line')->nullable();
            $table->string("footer_copyright")->nullable();
            $table->string("gst_number")->nullable();
            $table->string("licence")->nullable();

            $table->text("app_store")->nullable();
            $table->boolean("show_app_store")->default(false);

            $table->text("play_store")->nullable();
            $table->boolean("show_play_store")->default(false);

            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("youtube")->nullable();

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
        Schema::dropIfExists('frontend_settings');
    }
}
