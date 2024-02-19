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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned(); //user_id
            $table->bigInteger('sale_id')->unsigned(); //sale id
            $table->integer('qty');
            $table->decimal('unit_price', 10, 2);
            //foreign key -> product
            $table->foreign('product_id')->references('id')->on('products');
            //foreign key -> sales
            $table->foreign('sale_id')->references('id')->on('sales');
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
        Schema::dropIfExists('sale_details');
    }
};
