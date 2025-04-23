<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Subject;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $subjects = Subject::all();
    
            foreach ($subjects as $subject) {
                // Create 3 tasks for each subject
                for ($i = 1; $i <= 3; $i++) {
                    Task::create([
                        'name' => "Task $i for " . $subject->name,
                        'description' => "This is the description for Task $i in the " . $subject->name . " subject. Complete the requirements and submit your solution.",
                        'points' => rand(5, 20),
                        'subject_id' => $subject->id,
                    ]);
                }
            }
        }
    }
}
