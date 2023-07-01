<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'عبدالوهاب محمد',
            'address' => 'Sixty street',
            'job' => 'ادمن',
            'phone_number' => '770101198',
            'password' => Hash::make('1234'),
        ]);
    }
}
