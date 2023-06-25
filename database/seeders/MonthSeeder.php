<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('months')->delete();
        $months = [
            'فبراير',
            'مارس',
            'ابريل',
            'اكتوبر',
            'نوفمبر',
            'ديسمبر',
        ];
        foreach ($months as $S) {
            Month::create(['name' => $S]);
        }
    }
}
