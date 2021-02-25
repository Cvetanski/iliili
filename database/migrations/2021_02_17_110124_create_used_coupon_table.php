<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_coupon', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('coupon_id');
            $table->index('coupon_id');
            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('used_coupon');
    }
}
