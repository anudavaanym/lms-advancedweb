<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        $subject = $task->subject;
        $solutions = $task->solutions()->with('user')->get();
        
        $totalSolutions = $solutions->count();
        $evaluatedSolutions = $solutions->filter(function($solution) {
            // Check if the solution has been evaluated
            return $solution->points !== null && $solution->evaluation !== null;
        })->count();
        
        $solution = null;

        if (!Auth::user()->isTeacher()) {
            $solution = $task->solutions()->where('user_id', Auth::id())->first();
        }
        
        return view('tasks.show', compact('task', 'subject', 'solution', 'solutions', 'totalSolutions', 'evaluatedSolutions'));
    }

    public function create(Subject $subject)
    {
        $this->authorize('update', $subject);
        return view('tasks.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $this->authorize('update', $subject);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);

        $validated['subject_id'] = $subject->id;
        
        Task::create($validated);
        
        return redirect()->route('subjects.show', $subject)->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task->subject);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task->subject);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);
        
        $task->update($validated);
        
        return redirect()->route('subjects.show', $task->subject)->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task->subject);
        $subject = $task->subject;
        
        $task->delete();
        
        return redirect()->route('subjects.show', $subject)->with('success', 'Task deleted successfully.');
    }
}
