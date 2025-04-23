<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\User;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher1 = User::where('email', 'anudavaanyam1@gmail.com')->first();
        $teacher2 = User::where('email', 'john1234@gmail.com')->first();

    // Create subjects for the first teacher
    $subject1 = Subject::create([
        'name' => 'Introduction to Programming',
        'description' => 'Learn the basics of programming with Python.',
        'subject_code' => 'IK-PRG101',
        'credit_value' => 5,
        'user_id' => $teacher1->id,
    ]);

    $subject2 = Subject::create([
        'name' => 'Web Development Fundamentals',
        'description' => 'Introduction to HTML, CSS, and JavaScript.',
        'subject_code' => 'IK-WEB201',
        'credit_value' => 4,
        'user_id' => $teacher1->id,
    ]);

    // Create subjects for the second teacher
    $subject3 = Subject::create([
        'name' => 'Database I',
        'description' => 'Learn about relational databases and SQL.',
        'subject_code' => 'IK-DBS301',
        'credit_value' => 6,
        'user_id' => $teacher2->id,
    ]);

    $subject4 = Subject::create([
        'name' => 'Software Engineering',
        'description' => 'Principles and practices of software development.',
        'subject_code' => 'IK-SWE401',
        'credit_value' => 5,
        'user_id' => $teacher2->id,
    ]);

    // Enroll students in subjects
    $students = User::whereHas('role', function ($query) {
        $query->where('name', 'student');
    })->get();

    foreach ($students as $index => $student) {
        // Enroll first student in all subjects
        if ($index === 0) {
            $student->studentSubjects()->attach([$subject1->id, $subject2->id, $subject3->id, $subject4->id]);
        } 
        // Enroll second student in first teacher's subjects
        else if ($index === 1) {
            $student->studentSubjects()->attach([$subject1->id, $subject2->id]);
        } 
        // Enroll third student in second teacher's subjects
        else if ($index === 2) {
            $student->studentSubjects()->attach([$subject3->id, $subject4->id]);
        }
    }
  }
}
