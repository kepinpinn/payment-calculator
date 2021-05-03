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
            $table->unsignedBigInteger('borrower');
            $table->integer('price_qty');
            $table->text('description')->nullable();
            $table->string('status')->default('unpaid');
            $table->timestamps();

            $table->foreign('shopping_id')->references('id')->on('shoppings')
                ->onDelete('cascade');
            $table->foreign('borrower')->references('id')->on('users')
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
