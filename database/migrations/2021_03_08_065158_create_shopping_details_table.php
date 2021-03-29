<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_id');
            $table->string('borrower');
            $table->integer('price_qty');
            $table->boolean('ppn_borrower');
            $table->integer('promo_borrower');
            $table->integer('delivery_borrower');
            $table->integer('total_bayar_borrower');
            $table->text('description');
            $table->string('status')->default('unpaid');
            $table->timestamps();

            $table->foreign('shopping_id')->references('id')->on('shoppings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_details');
    }
}
