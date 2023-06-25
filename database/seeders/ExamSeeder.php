<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '1',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '2',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '3',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '4',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '5',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '6',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

        DB::table('exams')->insert([
            'classroom_id' => '1 ',
            'subject_id' => '7',
            'teacher_id' => '1',
            'month_id' => '1',
            'total_marks' => '40',
            'year' => '2023',
        ]);

    }
}
