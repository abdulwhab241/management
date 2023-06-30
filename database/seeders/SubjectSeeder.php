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
            'name' => 'القرأن الكريم',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'التربيــة الإسلاميــة ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'اللغة العربية ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'العلوم ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'الرياضيات ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'اللغة الإنجليزية ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'الإجتماعيات ',
            'degree' => '100',
            'grade_id' => '1',
            'classroom_id' => '1',
            'teacher_id' => '1',
            'year' => 2023,
        ]);
    }
}
