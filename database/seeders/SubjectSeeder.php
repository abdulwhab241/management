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
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'التربيــة الإسلاميــة ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'اللغة العربية ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'العلوم ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'الرياضيات ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'اللغة الإنجليزية ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);

        DB::table('subjects')->insert([
            'name' => 'الإجتماعيات ',
            'grade_id' => '1',
            'classroom_id' => '1',
            'year' => 2023,
        ]);
    }
}
