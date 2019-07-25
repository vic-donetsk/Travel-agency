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
            $table->bigIncrements('id');
            $table->string('author_name');                // имя комментатора
            $table->string('author_email');               // почта комментатора
            $table->unsignedBigInteger('tour_id');        // ИД тура
            $table->text('content');                      // текст комментария
            $table->timestamps();

            $table->foreign('tour_id')
                ->references('id')
                ->on('tours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
             $table->dropForeign(['tour_id']);
        });
        Schema::dropIfExists('comments');
    }
}
