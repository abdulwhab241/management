<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '1 ',
            'subject_id' => '1',
            'month_id' => '1',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);

        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '2',
            'subject_id' => '1',
            'month_id' => '2',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);

        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '3 ',
            'subject_id' => '1',
            'month_id' => '3',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);

        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '4 ',
            'subject_id' => '1',
            'month_id' => '4',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);

        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '5 ',
            'subject_id' => '1',
            'month_id' => '5',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);

        DB::table('student_results')->insert([
            'student_id' => '2 ',
            'student_grade_id' => '6 ',
            'subject_id' => '1',
            'month_id' => '6',
            'degree' => '70',
            'year' => '2023',
            'date' => '2023-06-29',
        ]);
    }
}
