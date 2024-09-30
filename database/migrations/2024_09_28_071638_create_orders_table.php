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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('work_topic');
            $table->string('work_type'); // Тип работы
            $table->string('subject'); // Предмет
            $table->text('explanation')->nullable(); // Пояснения и комментарии
            $table->date('due_date'); // Срок сдачи
            $table->decimal('budget', 10, 2)->nullable(); // Бюджет (в рублях)
            $table->string('file_path')->nullable(); // Путь к загруженному файлу
            $table->unsignedBigInteger('user_id'); // Assuming the user is placing the order
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
