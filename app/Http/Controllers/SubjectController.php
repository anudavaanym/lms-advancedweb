<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        if ($user->isTeacher()) {
            $subjects = $user->teacherSubjects;
            return view('subjects.index', compact('subjects'));
        } else {
            $subjects = $user->studentSubjects;
            return view('student.subjects.index', compact('subjects'));
        }
    }

    public function show(Subject $subject)
    {
        $user = Auth::user();
        $tasks = $subject->tasks;
        
        if ($user->isTeacher()) {
            return view('subjects.show', compact('subject', 'tasks'));
        } else {
            // Load the teacher and students relationships
            $subject->load(['teacher', 'students']);
            
            $solution = null;
            $solutions = [];
            
            foreach ($tasks as $task) {
                $solutions[$task->id] = $user->solutions()->where('task_id', $task->id)->first();
            }
            
            return view('student.subjects.show', compact('subject', 'tasks', 'solutions'));
        }
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string',
            'subject_code' => 'required|string|regex:/^IK-[A-Z]{3}[0-9]{3}$/|max:20|unique:subjects',
            'credit_value' => 'required|integer|min:1',
        ], [
            'name.required' => 'The subject name is required.',
            'name.min' => 'The subject name must be at least 3 characters.',
            'subject_code.required' => 'The subject code is required.',
            'subject_code.regex' => 'The subject code must be in IK-SSSNNN format (e.g., IK-ABC123).',
            'subject_code.unique' => 'This subject code is already in use.',
            'credit_value.required' => 'The credit value is required.',
            'credit_value.integer' => 'The credit value must be a number.',
        ]);
    
        $validated['user_id'] = Auth::id();
        
        Subject::create($validated);
        
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(Subject $subject)
    {
        $this->authorize('update', $subject);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->authorize('update', $subject);
        
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string',
            'subject_code' => 'required|string|regex:/^IK-[A-Z]{3}[0-9]{3}$/|max:20|unique:subjects,subject_code,' . $subject->id,
            'credit_value' => 'required|integer|min:1',
        ], [
            'name.required' => 'The subject name is required.',
            'name.min' => 'The subject name must be at least 3 characters.',
            'subject_code.required' => 'The subject code is required.',
            'subject_code.regex' => 'The subject code must be in IK-SSSNNN format (e.g., IK-ABC123).',
            'subject_code.unique' => 'This subject code is already in use.',
            'credit_value.required' => 'The credit value is required.',
            'credit_value.integer' => 'The credit value must be a number.',
        ]);
        
        $subject->update($validated);
        
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $this->authorize('delete', $subject);
        
        $subject->delete();
        
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function enroll(Subject $subject)
    {
        $user = Auth::user();
        
        if ($user->studentSubjects->contains($subject)) {
            return redirect()->back()->with('error', 'You are already enrolled in this subject.');
        }
        
        $user->studentSubjects()->attach($subject);
        
        return redirect()->back()->with('success', 'Enrolled successfully.');
    }

    public function unenroll(Subject $subject)
    {
        $user = Auth::user();
        
        if (!$user->studentSubjects->contains($subject)) {
            return redirect()->back()->with('error', 'You are not enrolled in this subject.');
        }
        
        $user->studentSubjects()->detach($subject);
        
        return redirect()->back()->with('success', 'Unenrolled successfully.');
    }

    public function availableSubjects()
    {
        $user = Auth::user();
        
        // Get IDs of subjects the user is already enrolled in
        $enrolledSubjectIds = $user->studentSubjects->pluck('id');
        
        // Get all subjects that the user is not enrolled in, with their teachers
        $availableSubjects = Subject::with('user')
            ->whereNotIn('id', $enrolledSubjectIds)
            ->get();
        
        return view('student.subjects.available', compact('availableSubjects'));
    }

    public function takeSubject(Subject $subject)
    {
        // Use the existing enroll method but redirect to subjects.index
        $this->enroll($subject);
        
        return redirect()->route('subjects.index')->with('success', 'You have successfully enrolled in ' . $subject->name);
    }

    public function leaveSubject(Subject $subject)
    {
        $user = Auth::user();
        
        if (!$user->studentSubjects->contains($subject)) {
            return redirect()->back()->with('error', 'You are not enrolled in this subject.');
        }
        
        $user->studentSubjects()->detach($subject);
        
        return redirect()->route('subjects.index')->with('success', 'You have successfully left ' . $subject->name);
    }
}
