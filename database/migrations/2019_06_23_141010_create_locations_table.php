<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();   // название стартовой локации
                    // не обязательно, поскольку может быть просто указан город
            $table->unsignedBigInteger('city_id');  // ИД города отправления
            $table->string('variant');  // способ отправления - вылет, выезд итд
            $table->timestamps();

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('locations');
    }
}
