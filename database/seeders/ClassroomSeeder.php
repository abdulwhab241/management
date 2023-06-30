<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->delete();
        $classrooms = [
                'الصف الاول',
                'الصف الثاني',
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'name_class' => $classroom,
            'grade_id' => Grade::all()->unique()->random()->id,
            'year' => 2023,
            ]);
        }
    }
}
