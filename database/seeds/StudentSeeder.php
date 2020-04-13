<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student;
        $student->name = 'Andra Yuda';
        $student->email = 'andra@email.com';
        $student->jurusan = 'Rekayasa Perangkat Lunak';
        $student->save();

    }
}
