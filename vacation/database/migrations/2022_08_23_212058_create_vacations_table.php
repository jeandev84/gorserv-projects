<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Таблица (vacations) отвечает за "Отпуск"
*/
class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {

            // идентификатор записи
            $table->id();

            // первичный ключ (id) из таблицы пользователей (users)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // дата начала отпуска
            $table->date('date_start_at');

            // дата окончания отпуска
            $table->date('date_end_at');

            // индексация полей 'date_start_at, date_end_at'
            $table->index(['date_start_at', 'date_end_at']);

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
        Schema::dropIfExists('vacations');
    }
}
