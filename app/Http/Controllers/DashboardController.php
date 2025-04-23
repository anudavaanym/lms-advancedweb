<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solution;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isTeacher()) {
            // Get the teacher's subjects
            $subjects = $user->teacherSubjects;
            
            // Get pending solutions that need evaluation
            $pendingSolutions = Solution::whereHas('task', function($query) use ($user) {
                $query->whereIn('subject_id', $user->teacherSubjects->pluck('id'));
            })->whereNull('points')->with('task.subject', 'user')->latest()->take(5)->get();
            
            // Get recent activities
            $recentSubmissions = Solution::whereHas('task', function($query) use ($user) {
                $query->whereIn('subject_id', $user->teacherSubjects->pluck('id'));
            })->with('task.subject', 'user')->latest()->take(3)->get();
            
            // Get upcoming deadlines
            $upcomingTasks = Task::whereIn('subject_id', $user->teacherSubjects->pluck('id'))
                ->whereNotNull('due_date')
                ->where('due_date', '>=', now())
                ->orderBy('due_date')
                ->take(3)
                ->get();
            
            return view('dashboard.teacher', compact('subjects', 'pendingSolutions', 'recentSubmissions', 'upcomingTasks'));
        } else {
            // For students, show the student dashboard
            $subjects = $user->studentSubjects;
            
            // Get upcoming tasks for the student
            $upcomingTasks = Task::whereIn('subject_id', $subjects->pluck('id'))
                ->whereNotNull('due_date')
                ->where('due_date', '>=', now())
                ->orderBy('due_date')
                ->take(3)
                ->get();
            
            // Get recent grades
            $recentSolutions = $user->solutions()
                ->with('task.subject')
                ->latest()
                ->take(3)
                ->get();
            
            return view('dashboard.student', compact('subjects', 'upcomingTasks', 'recentSolutions'));
        }
    }
}