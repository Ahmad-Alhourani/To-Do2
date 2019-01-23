<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('todo_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('todo_id');
            $table->unsignedInteger('category_id');

            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('todo_id')
                ->references('id')
                ->on('todos')
                ->onDelete('cascade');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('todo_categories');
    }
}
