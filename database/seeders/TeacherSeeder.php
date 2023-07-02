<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'name' => 'تجربة ',
            'gender_id' => '1',
            'specialization_id' => '1',
            'joining_date' => '2020-05-13',
            'phone_number' => '1234',
            'password' => Hash::make('1234'),
            'address' => 'تجربة',
        ]);

        DB::table('teacher_section')->insert([
            'teacher_id' => '1',
            'section_id' => '1',
        ]);
    }
}
