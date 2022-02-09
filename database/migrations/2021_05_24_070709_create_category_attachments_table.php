<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('page_category_id')->unsigned();
            $table->string('image_path', 500)->nullable();
            $table->foreign('page_category_id')
                  ->references('id')->on('page_categories')
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
        Schema::dropIfExists('category_attachments');
    }
}
