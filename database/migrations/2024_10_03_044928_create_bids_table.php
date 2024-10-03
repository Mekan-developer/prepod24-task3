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
        Schema::create('bids', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор заявки
            $table->unsignedBigInteger('task_id'); // ID задания
            $table->unsignedBigInteger('performer_id'); // ID исполнителя, который подает заявку
            $table->text('message'); // Сообщение или предложение исполнителя
            $table->decimal('bid_amount', 10, 2); // Сумма, которую исполнитель предлагает за выполнение работы
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Статус заявки | 'на рассмотрении', 'принят', 'отклонен'|
            $table->boolean('showed_client')->default(false);
            $table->timestamps(); // Время создания и обновления заявки
        
            // Внешние ключи
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
