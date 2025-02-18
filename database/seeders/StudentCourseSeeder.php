<?php

namespace Database\Seeders;

use App\Models\StudentCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentCourse::create([
            'student_id' => '1',
            'course_id' => '2'
        ], [
            'student_id' => '2',
            'course_id' => '3'
        ], [
            'student_id' => '3',
            'course_id' => '4'
        ], [
            'student_id' => '4',
            'course_id' => '1'
        ]);
    }
}
