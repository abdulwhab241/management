<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '1',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);

        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '2',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);

        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '3',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);

        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '2',
            'month_id' => '4',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);

        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '2',
            'month_id' => '5',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);

        DB::table('student_grades')->insert([
            'teacher_id' => '1 ',
            'subject_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '2',
            'month_id' => '6',
            'homework' => '10',
            'verbal' => '10',
            'attendance' => '10',
            'result' => '40',
            'total' => '70',
            'year' => '2023',
        ]);
    }
}
