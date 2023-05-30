<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
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
        foreach(range(1,50) as $i){
        
            Student::create(
                [
                    "name"=>fake()->name,
                    "gender_id"=>'1',
                    "birth_date"=>'2000-02-02',
                    "grade_id"=>'1',
                    "section_id"=>'1',
                    "classroom_id"=>'1',
                    "academic_year"=>'2023',
                    "father_name"=>fake()->name,
                    "employer"=>fake()->name,
                    "father_job"=>fake()->name,
                    "father_phone"=>fake()->phoneNumber(),
                    "password"=>Hash::make('1234'),
                    "home_phone"=>fake()->phoneNumber(),
                    "address"=>fake()->name,
                    "mother_name"=>fake()->name,
                    "mother_phone"=>fake()->phoneNumber(),
                    "mother_job"=>fake()->phoneNumber()
                
                ]
                );
        }
    }
}
