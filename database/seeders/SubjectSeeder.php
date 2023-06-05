<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'name' => 'اللغة العربية ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
        ]);
    }
}
