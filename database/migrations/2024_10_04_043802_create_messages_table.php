<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор сообщения
            $table->unsignedBigInteger('task_id'); // ID задания
            $table->unsignedBigInteger('sender_id'); // ID отправителя (может быть заказчик или исполнитель)
            $table->unsignedBigInteger('receiver_id'); // ID получателя
            $table->text('message'); // Текст сообщения
            $table->boolean('showed_receiver')->default(false);
            $table->timestamps(); // Время отправки сообщения

            // Внешние ключи
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
