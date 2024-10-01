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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('title'); // Название задания — текст
            $table->string('work_type'); // Тип работы
            $table->string('subject'); // Предмет
            $table->text('description')->nullable(); // Пояснения и комментарии(description)
            $table->decimal('price', 10, 2)->nullable(); // Бюджет (в рублях)
            $table->unsignedBigInteger('performer_id')->nullable(); // Исполнитель — пользователь
            $table->unsignedBigInteger('client_id'); // Заказчик — пользователь
            $table->enum('status', ['Looking for performer', 'In progress', 'Under guarantee', 'Completed']) // Статус задания
            ->default('Looking for performer');
            $table->date('deadline')->nullable(); // Дедлайн — дата завершения работы
            $table->date('start_date')->nullable(); // Дата начала работы
            $table->foreignId('comment_id')->nullable()->constrained('comments'); // Комментарии/Обсуждения
            $table->string('progress')->nullable(); // Прогресс работы — процент выполнения или текстовый статус
            $table->string('file_path')->nullable(); // Путь к загруженному файлу

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
