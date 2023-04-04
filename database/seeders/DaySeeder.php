<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('days')->delete();
        $days = [
            'السبت',
            'الأحد',
            'الاثنين',
            ' الثلاثاء',
            'الأربعاء',
        ];
        foreach ($days as $S) {
            Day::create(['name' => $S]);
        }
    }
}
