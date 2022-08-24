<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Таблица (vacation_approvals) отвечает за "Согласование отпусков"
*/
class CreateVacationApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('vacation_approvals', function (Blueprint $table) {

            // идентификатор записи
            $table->id();


            // первичный ключ (id) из таблицы пользователей (users)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');


            // первичный ключ (id) из таблицы отпусков (vacations)
            $table->foreignId('vacation_id')
                  ->constrained()
                  ->onDelete('cascade');


            // результат согласования (approve/decline) ...
            $table->string('result_approval', 100);


            // идентификатор пользователя ( кто согласовал )
            $table->bigInteger('member_id');


            // указываем уникальные ключи
            $table->unique(['user_id', 'vacation_id']);


            // добавление полей даты создания и обновления записи (created_at, updated_at)
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
        Schema::dropIfExists('vacation_approvals');
    }
}
