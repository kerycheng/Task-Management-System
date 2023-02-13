<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller{
    public function home(){
        return view('home');
    }

    public function index(){
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request){
        $task = new Task;
        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->creator = $request->creator;
        $task->executor = $request->executor;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;
        $task->save();

        return redirect('/')->with('message', '發佈成功!');
    }
}
