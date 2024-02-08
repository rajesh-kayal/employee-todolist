<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\Employee;

class TodoController extends Controller
{
    public function todos(){
        $employees = Employee::with('tasks.TaskType')->get();
        // dd($employees);
        return view('admin.todos', compact('employees'));
    }
    public function addtodo()
    {
        return view('admin.addtodo');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'employee_name' => 'required',
                'employee_email' => 'required|email|unique:employees,email',
                'employee_phone' => 'required',
                'department' => 'required',
                'task_title' => 'required',
                'task_description' => 'required|max:255',
                'deadline_days' => 'required|date',
            ]);

            $employee = Employee::create([
                'name' => $request->employee_name,
                'email' => $request->employee_email,
                'phone' => $request->employee_phone,
                'department' => $request->department,
            ]);

            $task = Task::create([
                'task_status' => 'pending',
                'task_title' => $request->task_title,
                'task_description' => $request->task_description,
                'deadline_days' => $request->deadline_days,
            ]);

            $taskType = TaskType::create([
                'task_title' => $request->task_title,
                'task_description' => $request->task_description,
            ]);
            if ($employee && $task && $taskType) {
                return redirect()->route('admin.users')->with('success', 'Todo added successfully');
            } else {
                return redirect()->back()->with('unsuccess', 'Failed to added todo. Please try again.');
            }  
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'Failed to add task. Please make sure the employee email is unique.');
        }
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
    public function editTodo($id)
    {
        $employees = Employee::with('tasks.TaskType')->findOrFail($id);
        // dd($employees);
        return view('admin.edittodo', compact('employees'));
    }

    public function updateTodo(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $request->input('employee_name'),
            'email' => $request->input('employee_email'),
            'phone' => $request->input('employee_phone'),
            'department' => $request->input('department'),
        ]);

        $task = $employee->tasks()->first();
        $taskType = $task->TaskType;

        $taskType->update([
            'task_title' => $request->input('task_title'),
            'task_description' => $request->input('task_description'),
        ]);

        if ($task) {
            $task->update([
                'deadline_days' => $request->input('deadline_days'),
            ]);
        }
        if ($employee && $task && $taskType) {
            return redirect()->route('admin.users')->with('update', 'Todo updated successfully');
        } else {
            return redirect()->back()->with('unupdate', 'Failed to update todo. Please try again.');
        }  
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with('success', 'Todo deleted successfully');
    }

}
