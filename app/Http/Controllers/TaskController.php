<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller{
    public function home(){
        $tasks = Task::all();

        return view('home', compact('tasks'));
    }

    public function create(Request $request){
        $users = User::all();

        return view('tasks.create', compact('users'));
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
