<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\Employee;
class UserController extends Controller
{
    public function todos()
    {
        $employees = Employee::with('tasks.TaskType')->get();
        // dd($employees);
        return view('user.todos', compact('employees'));
    }

    public function updateTaskStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:progress,pending,complete',
        ]);

        $task->task_status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
