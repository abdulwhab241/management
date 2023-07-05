<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SemesterSeeder::class);
        // $this->call(GradeSeeder::class);
        // $this->call(ClassroomSeeder::class);
        // $this->call(SectionSeeder::class);
        // $this->call(FeeSeeder::class);
        // $this->call(StudentSeeder::class);
        // $this->call(TeacherSeeder::class);
        // $this->call(SubjectSeeder::class);
        // $this->call(TestSeeder::class);
        $this->call(MonthSeeder::class);
        // $this->call(ExamSeeder::class);
        // $this->call(ResultSeeder::class);
        // $this->call(StudentGradeSeeder::class);
        // $this->call(StudentResultSeeder::class);
        // $this->call(FinalSeeder::class);
    }
}
