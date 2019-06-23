<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id');       // ИД тура
            $table->unsignedBigInteger('media_id');      // ИД изображения
            $table->unique(['tour_id', 'media_id']);     // картинки в туре не должны повторяться
            $table->timestamps();

            $table->foreign('media_id')
                ->references('id')
                ->on('media');

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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['media_id']);
            $table->dropForeign(['tour_id']);
        });

        Schema::dropIfExists('tour_media');
    }
}
