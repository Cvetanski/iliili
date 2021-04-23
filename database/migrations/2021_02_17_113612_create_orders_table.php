<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('delivery_id');
            $table->index('delivery_id');
            $table->foreign('delivery_id')
                ->references('id')
                ->on('delivery')
                ->onDelete('cascade');

            $table->unsignedBigInteger('payment_method_id');
            $table->index('payment_method_id');
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
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
        Schema::dropIfExists('orders');
    }
}
