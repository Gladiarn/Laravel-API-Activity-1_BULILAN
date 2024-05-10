<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();
    }
}
