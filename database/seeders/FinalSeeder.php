<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 1',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 2',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 3',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 4',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 5',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 6',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

        DB::table('final_results')->insert([
            'student_id' => '2 ',
            'subject_id' => ' 7',
            'classroom_id' => '1',
            'f_total_write' =>'خمسون ',
            'f_total_number' => ' 50',
            's_total_write' =>'خمسون ',
            's_total_number' => ' 50',
            'total' => ' 100 ',
            'year' => '2023',
            'date' => '2023-06-13',
        ]);

    }
}
