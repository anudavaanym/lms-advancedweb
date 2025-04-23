<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Solution;
use App\Models\Task;
use App\Models\User;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->get();

        foreach ($students as $student) {
            // Get tasks from subjects the student is enrolled in
            $tasks = Task::whereIn('subject_id', $student->studentSubjects->pluck('id'))->get();

            foreach ($tasks as $index => $task) {
                // Only create solutions for some tasks (not all)
                if ($index % 2 === 0) {
                    $solution = Solution::create([
                        'content' => "This is {$student->name}'s solution for the task '{$task->name}'. The solution includes code and explanations to meet the requirements specified in the task description.",
                        'task_id' => $task->id,
                        'user_id' => $student->id,
                    ]);

                    // Evaluate some solutions
                    if ($index % 3 === 0) {
                        $points = rand(0, $task->points);
                        $solution->update([
                            'points' => $points,
                            'evaluation' => "Your solution has been evaluated and received {$points} out of {$task->points} points. " . ($points > $task->points / 2 ? "Good job!" : "There's room for improvement."),
                        ]);
                    }
                }
            }
        }
    }
}
