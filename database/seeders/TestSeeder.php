<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,100000) as $i){
        
            // Student::create(
            //     [
            //         "name"=>fake()->name,
            //         "gender_id"=> Gender::all()->unique()->random()->id,
            //         "birth_date"=>'2000-02-02',
            //         "grade_id"=>'1',
            //         "section_id"=> Section::all()->unique()->random()->id,
            //         "classroom_id"=> Classroom::all()->unique()->random()->id,
            //         "academic_year"=>'2023',
            //         "father_name"=>fake()->name,
            //         "employer"=>fake()->name,
            //         "father_job"=>fake()->name,
            //         "father_phone"=>fake()->phoneNumber(),
            //         "password"=>Hash::make('1234'),
            //         "home_phone"=>fake()->phoneNumber(),
            //         "address"=>fake()->name,
            //         "mother_name"=>fake()->name,
            //         "mother_phone"=>fake()->phoneNumber(),
            //         "mother_job"=>fake()->phoneNumber(),
            //         'year' => '2023'
                
            //     ]
            //     );

            Grade::create(
                [
                    "name"=>fake()->name,
                    "notes"=>fake()->name,
                    'year' => '2023'
            
                ]
                );
        }
    }
}
