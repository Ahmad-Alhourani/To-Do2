<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body')->nullable();
            $table->unsignedInteger('person_id');
            $table->unsignedInteger('todo_id');

            $table->timestamps();
            $table->string('slug');
            $table->softDeletes();
            $table->unique('slug');

            $table
                ->foreign('person_id')
                ->references('id')
                ->on('men')
                ->onDelete('cascade');
            $table
                ->foreign('todo_id')
                ->references('id')
                ->on('todos')
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
        Schema::dropIfExists('comments');
    }
}
