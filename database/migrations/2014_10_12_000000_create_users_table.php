<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();             // имя пользователя
            $table->string('last_name')->nullable();              // фамилия
            $table->string('phone')->nullable();                  // телефон
            $table->string('email')->unique();                    // адрес электронной почты (он же логин)
            $table->string('avatar');                             // адрес аватарки
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');                           // хэш пароля
            //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
