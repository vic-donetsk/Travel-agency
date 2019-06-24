<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_id');        // ИД покупателя
            $table->unsignedBigInteger('seller_id');       // ИД продавца
            $table->unsignedInteger('total_price');  // общая цена сделки
            $table->timestamps();

            $table->foreign('buyer_id')
                ->references('id')
                ->on('users');

            $table->foreign('seller_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropForeign(['buyer_id']);
        });
        Schema::dropIfExists('deals');
    }
}
