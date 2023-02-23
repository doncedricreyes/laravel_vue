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
               
            ]
            );
            $data['user_id'] = auth()->user()->id;
            Task::create($data);
            return redirect('/task')->with('message', 'Listing created successfully!');


    }

    public function index()
    {
        $tasks = Task::get();
        return view('task.index',['tasks'=>$tasks]);
    }

    public function edit($id)
    {   
        $tasks = Task::where('id',$id)->get();
        return view('task.edit',['tasks'=>$tasks]);
    }

    public function update(Request $request, $task)
    {
      
     $id = Task::find($task);

        $data = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'nullable',
        ]);

        if($id->user_id == auth()->user()->id ){
      $id->user_id = auth()->user()->id;
      $id->name = $request->name;
      $id->description = $request->description;
      $id->date = $request->date;
      $id->save();
        }
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if(auth()->user()->id == $task->user_id)
        {
            $task->delete();
        }

    }   


}
