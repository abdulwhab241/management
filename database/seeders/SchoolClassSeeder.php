<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('school_classes')->delete();
        $SchoolClass = [
            'الحصه الأولى',
            'الحصه الثانية',
            'الحصه الثالثة',
            ' الحصه الرابعة',
            'الحصه الخامسة',
            'الحصه السادسة',
            'الحصه السابعة',
        ];
        foreach ($SchoolClass as $S) {
            SchoolClass::create(['name' => $S]);
        }
    }
}
