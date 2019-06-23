<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id');    // Идентификатор тура
            $table->unsignedBigInteger('deal_id');    // В какую сделку входит
            $table->unsignedDecimal('price', 8, 2);   // Цена этого тура
            $table->timestamps();

            $table->foreign('tour_id')
                ->references('id')
                ->on('tours');
                
            $table->foreign('deal_id')
                ->references('id')
                ->on('deals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['deal_id']);
            $table->dropForeign(['tour_id']);
        });
    }
}
