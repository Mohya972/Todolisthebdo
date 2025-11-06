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
        $tasks=Task::all();
       // dd($tasks);
        return view('layouts.task.index',compact('tasks'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $validated = $request->validate([ 
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        $task = Task::create($validated);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        return view('layouts.task.detail', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $task=Task::findOrFail($id);
        switch($task->status){
            case 'false':
                $task->status='true';
                break;
            case 'true':
                $task->status='false';
                break;
            
        }
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return redirect()->route('task.index');
    }

    public function confirmDelete(string $id)
    {
        $task = Task::findOrFail($id);
        return view('layouts.task.confirm-delete', compact('task'));
    }
}
