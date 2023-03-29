<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('fees')->insert([
            'title' => 'رسوم دراسية للعام',
            'amount' => '100000.00',
            'grade_id' => Grade::all()->unique()->random()->id,
            'classroom_id' => Classroom::all()->unique()->random()->id,
            'year' => '2023',
            'fee_type' => 'رسوم دراسية',
        ]);
    }
}
