<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');                         // название тура
            $table->text('description');                    // описание
            $table->unsignedDecimal('price', 8, 2);         // цена
            $table->timestamp('started_at');                // начало тура
            $table->timestamp('finished_at');               // конец тура

            $table->boolean('for_children')->default(true); // доступна для детей?
            $table->unsignedBigInteger('main_img_id');      // ИД главной картиники тура
            $table->unsignedBigInteger('country_id');       // ИД страны путешествия
            $table->unsignedBigInteger('start_location_id');// ИД места старта и способа отбытия
            $table->unsignedBigInteger('hotel_id');         // ИД уровня размешения
            $table->unsignedBigInteger('category_id');      // ИД категории тура (авто-, авиа-, круиз)
            $table->unsignedBigInteger('type_id');          // ИД типа тура (шоппинг, СПА, семейный итд)
            $table->unsignedBigInteger('nutrition_id');     // ИД схемы питания в туре
            $table->unsignedBigInteger('seller_id');        // ИД продавца

            $table->timestamps();

            // внешние ключи
            $table->foreign('main_img_id')
                ->references('id')
                ->on('media');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries');

            $table->foreign('start_location_id')
                ->references('id')
                ->on('locations');

            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('type_id')
                ->references('id')
                ->on('types');
                
            $table->foreign('nutrition_id')
                ->references('id')
                ->on('nutritions');
                
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

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropForeign(['nutrition_id']);
            $table->dropForeign(['type_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['start_location_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['main_img_id']);
        });

        Schema::dropIfExists('tours');
    }
}
