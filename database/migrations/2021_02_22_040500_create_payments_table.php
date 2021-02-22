<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_id');
            $table->string('borrower');
            $table->integer('price_qty');
            $table->decimal('ppn_borrower');
            $table->decimal('presentase');
            $table->integer('promo_borrower');
            $table->integer('total_bayar_borrower');
            $table->text('description');
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
        Schema::dropIfExists('payments');
    }
}
