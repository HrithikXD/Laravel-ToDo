<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'tasks' => Task::where('completed',false)->latest()->paginate()
        ]);
    }

    //Show completed task list
    public function completedTask()
    {
        return view('showComplete', [
            'tasks' => Task::where('completed',true)->latest()->paginate()
        ]);
    }

    //PUT mark as complete
    public function complete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'max:100',
            'long_description' => 'max:200'
        ]);
        $task = Task::create($data);
        return redirect()->route('task.show', ['task' => $task->id])
            ->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->validate(
            [
                'title' => 'sometimes',
                'description' => 'max:100',
                'long_description' => 'max:200'
            ]
        ));
        return redirect()->route('task.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }


}
