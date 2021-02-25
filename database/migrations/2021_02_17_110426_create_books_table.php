<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_description');
            $table->string('file');
            $table->string('year');
            $table->string('quantity');
            $table->string('price');
            $table->string('translator');
            $table->string('publication_status');

            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('origin_id');
            $table->index('origin_id');
            $table->foreign('origin_id')
                ->references('id')
                ->on('origin')
                ->onDelete('cascade');

            $table->unsignedBigInteger('section_id');
            $table->index('section_id');
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('cascade');

            $table->unsignedBigInteger('author_id');
            $table->index('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
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
        Schema::dropIfExists('books');
    }
}
