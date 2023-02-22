<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'date' => 'required',
                'description' => 'nullable',
                'user_id'=>'nullable'
            ]
            );

            Task::create($data);
            return redirect('/task')->with('message', 'Listing created successfully!');


    }

    public function index()
    {
        $tasks = Task::get();
        return view('task.index',['tasks'=>$tasks]);
    }
}
