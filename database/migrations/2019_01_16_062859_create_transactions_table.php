<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('charge_id');
            $table->integer('cart_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('street');
            $table->string('street2');
            $table->string('city');
            $table->string('county');
            $table->string('zip_code');
            $table->string('country');
            $table->integer('sub_total');
            $table->integer('tax');
            $table->integer('grand_total');
            $table->string('description');
            $table->string('txn_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
