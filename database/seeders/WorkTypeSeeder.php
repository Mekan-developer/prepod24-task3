<?php

namespace Database\Seeders;

use App\Models\WorkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            1 => ['title' => 'Бизнес-план'],
            2 => ['title' => 'Дипломная работа'],
            3 => ['title' => 'Диссертация'],
            4 => ['title' => 'Доклад'],
            5 => ['title' => 'Другое'],
        ];

        foreach ($data as $key => $value) {
            WorkType::create($value);
        }
    }
}
