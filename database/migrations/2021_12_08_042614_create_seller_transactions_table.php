<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSellerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("wallet_id");
            $table->string("transaction_number")->unique();
            $table->float("amount")->default(0);
            $table->string("for")->nullable();
            $table->enum("state", ["debit", "credit"]);

            $table->string("status")->default("failed");

            $table->foreign("wallet_id")->references("id")->on("seller_wallets");
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
        Schema::dropIfExists('seller_transactions');
    }
}
