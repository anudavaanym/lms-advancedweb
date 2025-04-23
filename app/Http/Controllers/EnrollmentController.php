<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isTeacher()) {
            // For teachers, show subjects they teach and enrolled students
            $subjects = $user->teacherSubjects;
            return view('enrollments.teacher-index', compact('subjects'));
        } else {
            // For students, show subjects they're enrolled in
            $enrolledSubjects = $user->studentSubjects;
            $availableSubjects = Subject::whereNotIn('id', $enrolledSubjects->pluck('id'))->get();
            return view('enrollments.student-index', compact('enrolledSubjects', 'availableSubjects'));
        }
    }
    
    public function enroll(Subject $subject)
    {
        $user = Auth::user();
        
        if ($user->isTeacher()) {
            return redirect()->back()->with('error', 'Teachers cannot enroll in subjects.');
        }
        
        if ($user->studentSubjects->contains($subject)) {
            return redirect()->back()->with('error', 'You are already enrolled in this subject.');
        }
        
        $user->studentSubjects()->attach($subject);
        
        return redirect()->route('enrollments.index')->with('success', 'Enrolled successfully.');
    }
    
    public function unenroll(Subject $subject)
    {
        $user = Auth::user();
        
        if (!$user->studentSubjects->contains($subject)) {
            return redirect()->back()->with('error', 'You are not enrolled in this subject.');
        }
        
        $user->studentSubjects()->detach($subject);
        
        return redirect()->route('enrollments.index')->with('success', 'Unenrolled successfully.');
    }
    
    public function showStudents(Subject $subject)
    {
        $this->authorize('viewEnrollments', $subject);
        
        $students = $subject->students;
        
        return view('enrollments.students', compact('subject', 'students'));
    }
}
