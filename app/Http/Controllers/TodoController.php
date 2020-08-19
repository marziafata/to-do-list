<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function store(StoreBlogPost $request) {

        Todo::create($request->all());
        return redirect()->back()->with('success', 'Nuovo impegno inserito correttamente');
    }

    public function edit(Todo $todo) {

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo) {

        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('success', 'Hai aggiornato la nota!');
    }
}
