<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();

            $table->unsignedBigInteger("order_id");
            $table->string("invoice_number")->unique();
            $table->dateTime('due')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->enum('status', array('paid', 'unpaid', 'expired'));
            $table->float("total_amount")->default(0);
            $table->float("tax")->default(0);
            $table->float("discount")->default(0);
            $table->float("shipping_charges")->default(0);

            $table->foreign("order_id")->references("id")->on("orders");

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
        Schema::dropIfExists('invoices');
    }
}
