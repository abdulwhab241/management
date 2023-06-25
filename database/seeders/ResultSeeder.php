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
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '2 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '3 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '4 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '5 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '6 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);

        DB::table('results')->insert([
            'exam_id' => '7 ',
            'student_id' => '2',
            'section_id' => '1',
            'semester_id' => '1',
            // 'result_name' => 'فبراير',
            'marks_obtained' => '40',
            'appreciation' => 'ممـتـاز',
            'year' => '2023',
        ]);
    }
}
