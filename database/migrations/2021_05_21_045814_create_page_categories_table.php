<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->unsigned();
            $table->string('title')->unique();
            $table->string('slug')->unique()->nullable();
            $table->string('image_path', 500)->nullable();
            $table->boolean('status')->default('1');
            $table->foreign('page_id')
                  ->references('id')->on('pages')
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
        Schema::dropIfExists('page_categories');
    }
}
