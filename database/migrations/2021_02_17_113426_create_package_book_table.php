<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_book', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('package_id');
            $table->index('package_id');
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('book_id');
            $table->index('book_id');
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
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
        Schema::dropIfExists('package_book');
    }
}
