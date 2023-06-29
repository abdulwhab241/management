<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '1',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '2',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '3',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '4',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '5',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '1 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            'month_id' => '6',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        // DB::table('results')->insert([
        //     'exam_id' => '1 ',
        //     'student_id' => '2',
        //     'section_id' => '1',
        //     'semester_id' => '1',
        //     'month_id' => '6',
        //     'marks_obtained' => '40',
        //     'appreciation' => 'ممـتـاز',
        //     'year' => '2023',
        // ]);
    }
}
