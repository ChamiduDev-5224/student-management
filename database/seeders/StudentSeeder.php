<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'ST1',
            'email' => 'ST1@example.com'
        ], [
            'name' => 'ST2',
            'email' => 'ST2@example.com'
        ], [
            'name' => 'ST3',
            'email' => 'ST3@example.com'
        ], [
            'name' => 'ST4',
            'email' => 'ST4@example.com'
        ]);
    }
}
