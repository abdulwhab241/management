<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();
        $grades = [
            'المرحلة الابتدائية',
            // 'المرحلة الاساسية',
        ];

        foreach ($grades as $grade) {
            Grade::create(['name' => $grade, 'year' => 2023]);
        }
    }
}
