<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'علي عبدالله صالح الهمداني ',
            'gender_id' => Gender::all()->unique()->random()->id,
            'birth_date' => '2000-02-02',
            'grade_id' => Grade::all()->unique()->random()->id,
            'section_id' => Section::all()->unique()->random()->id,
            'classroom_id' => Classroom::all()->unique()->random()->id,
            'academic_year' => '2023',
            'father_name' => ' عبدالله صالح الهمداني ',
            'employer' => 'ناتكو',
            'father_job' => 'محاسب',
            'father_phone' => '777888999',
            'password' => Hash::make('1234'),
            'home_phone' => '01223344',
            'address' => 'شارع الرباط امام  مكتبة القلم الذهبي',
            'mother_name' => 'فاطمة علي الصنعاني',
            'mother_phone' => '777666555',
            'mother_job' => 'ربة منزل',
            'year' => '2023',
        ]);

        DB::table('students')->insert([
            'name' => 'علي صالح محمد ',
            'gender_id' => Gender::all()->unique()->random()->id,
            'birth_date' => '2000-02-02',
            'grade_id' => Grade::all()->unique()->random()->id,
            'section_id' => Section::all()->unique()->random()->id,
            'classroom_id' => Classroom::all()->unique()->random()->id,
            'academic_year' => '2023',
            'father_name' => ' صالح محمد الهمداني ',
            'employer' => 'ناتكو',
            'father_job' => 'محاسب',
            'father_phone' => '777888999',
            'password' => Hash::make('1234'),
            'home_phone' => '01223344',
            'address' => 'شارع الرباط امام  مكتبة القلم الذهبي',
            'mother_name' => 'فاطمة علي الصنعاني',
            'mother_phone' => '777666555',
            'mother_job' => 'ربة منزل',
            'year' => '2023',
        ]);
    }
}
