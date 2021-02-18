<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kreditor');
            $table->date('tanggal');
            $table->string('items');
            $table->integer('Amount');
            $table->decimal('ppn');
            $table->integer('delivery');
            $table->integer('total');
            $table->integer('promo');
            $table->integer('total_bayar');
            $table->string('borrower');
            $table->integer('price_qty');
            $table->decimal('ppn_borrower');
            $table->decimal('presentase');
            $table->integer('promo_borrower');
            $table->integer('total_bayar_borrower');
            $table->text('description');
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
        Schema::dropIfExists('shoppings');
    }
}
