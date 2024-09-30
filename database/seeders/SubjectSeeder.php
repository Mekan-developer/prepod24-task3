<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            1 => ['title' => 'Библиотечно-информационная деятельность'],
            2 => ['title' => 'Ветеринария'],
            3 => ['title' => 'Дизайн'],
            4 => ['title' => 'Документоведение и архивоведение'],
            5 => ['title' => 'Журналистика'],
        ];

        foreach ($data as $key => $value) {
            Subject::create($value);
        }
    }
}
