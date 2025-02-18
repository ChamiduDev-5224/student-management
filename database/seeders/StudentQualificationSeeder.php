<?php

namespace Database\Seeders;

use App\Models\StudentQualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            StudentQualification::create([
                'student_id' => '1',
                'qualification' => 'Master'
            ], [
                'student_id' => '3',
                'qualification' => 'Certificate'
            ], [
                'student_id' => '2',
                'qualification' => 'HND'
            ], [
                'student_id' => '4',
                'qualification' => 'Degree'
            ]);

    }
}
