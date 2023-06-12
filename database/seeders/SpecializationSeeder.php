<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();
        $specializations = [
            'اللغه العربيه',
            'القرأن الكريم',
            'التربيــة الإسلاميــة',
            'الكيمياء',
            'الفيزياء',
            'الاحياء',
            'المجتمع المدني',
            'التاريخ',
            'الجغرافيه',
            'حاسوب',
            'العلوم',
            'الرياضيات',
            'اللغه الانجليزيه',
            'رياضة',
            'فنية',
            'مكتبة',
            'الإجتماعيات',
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
