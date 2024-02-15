<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Todo.index',['todos'=>Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'date'=> 'required',
            'description'=>'required',
       ]);

        Todo::create($request->all());
        return redirect()->route('todo.index')->with('success','Todo added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return view('Todo.view',['todo'=>Todo::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Todo.edit',['todo'=>Todo::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'date'=> 'required',
            'description'=>'required',
       ]);

        $todo = Todo::find($id);
        $todo->fill($request->all())->save();

        return redirect()->route('todo.index')->with('success','Todo has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.index')->with('success','todo has deleted successfully');

    }
}
