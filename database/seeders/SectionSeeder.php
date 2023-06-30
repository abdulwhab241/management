<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();

        $Sections = [
            'أ',
            'ب',
        ];

        foreach ($Sections as $section) {
            Section::create([
                'name_section' => $section,
                'grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => Classroom::all()->unique()->random()->id,
                'year' => 2023
            ]);
        }
    }
}
