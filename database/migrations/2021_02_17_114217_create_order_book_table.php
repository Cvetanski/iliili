<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_book', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('book_id');
            $table->index('book_id');
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->index('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

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
        Schema::dropIfExists('order_book');
    }
}
