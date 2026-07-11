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
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }

    public function add(){

    $tasks = Task::all();
    return view('add', compact('tasks'));
    }

    // Store Tasks
    function store(Request $request){

    // dd($request->all());

         $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'status' => 'required|in:Pending,Completed',
    ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->status = $validated['status'];
        $task->save();

        return redirect()->route('index')->with('success','successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
