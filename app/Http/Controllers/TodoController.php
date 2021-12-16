<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('id', 'DESC')->get();
        //dd($todos);
        return view('todo.index', compact('todos'));
    }

  
    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        //Validate 
        $request->validate([
            'todo_name' => 'required',
            'description' => 'nullable',
        ]);

        //Insert into database
        $todo = new Todo;
        $todo->todo_name = $request->todo_name;
        $todo->description = $request->description;
        
        $todo->save();

        return redirect()->back()->with('success-message','Todo added Successfully!');
    }

    public function show(Todo $todo)
    {
        //
    }


    public function edit(Todo $todo)
    {
        return view('todo.edit',compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        //Validate 
        $request->validate([
            'todo_name' => 'required',
            'description' => 'nullable',
        ]);

        $todo->todo_name = $request->todo_name;
        $todo->description = $request->description;

        $todo->update();

        return redirect()->back()->with('success-message','Todo Updated Successfully!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success-message','Todo Deleted Successfully!');
    }

    public function markComplete(Todo $todo)
    {
        $todo->status = 1;
        $todo->update();
        return redirect()->back()->with('success-message','Todo Marked as Complete');
    }

    public function markIncomplete(Todo $todo)
    {
        $todo->status = 0;
        $todo->update();
        return redirect()->back()->with('success-message','Todo Marked as Incomplete');
    }

    public function deletedRecords()
    {
        $todos = Todo::onlyTrashed()->get();
        return view('todo.deleted-records',compact('todos'));
    }
}
