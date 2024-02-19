<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); //user_id
            $table->string('shipping_name');
            $table->string('shipping_address');
            $table->string('shipping_tel');
            $table->double('discount',10,2);
            $table->double('subtotal',10,2);
            $table->dateTime('payment_date')->nullable();
            $table->string('status');


            //foreign key -> users
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
};
