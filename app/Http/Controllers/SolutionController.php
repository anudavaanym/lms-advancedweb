<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
{

    public function show(Solution $solution)
    {
        $this->authorize('view', $solution);
        return view('solutions.show', compact('solution'));
    }

    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $validated['task_id'] = $task->id;
        $validated['user_id'] = Auth::id();
        
        // Check if solution already exists
        $existingSolution = Solution::where('task_id', $task->id)
            ->where('user_id', Auth::id())
            ->first();
            
        if ($existingSolution) {
            $existingSolution->update($validated);
            $message = 'Solution updated successfully.';
        } else {
            Solution::create($validated);
            $message = 'Solution submitted successfully.';
        }
        
        return redirect()->route('tasks.show', $task)->with('success', $message);
    }

    public function evaluate(Request $request, Solution $solution)
    {
        $this->authorize('evaluate', $solution);
        
        $validated = $request->validate([
            'points' => 'required|integer|min:0|max:' . $solution->task->points,
            'evaluation' => 'required|string',
        ]);
        
        $solution->update($validated);
        
        return redirect()->route('tasks.show', $solution->task)->with('success', 'Solution evaluated successfully.');
    }
}
