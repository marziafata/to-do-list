<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() {
        return view('todos.index');
    }

    public function create() {
        return view('todos.create');
    }

    public function store(StoreBlogPost $request) {

        Todo::create($request->all());
        return redirect()->back()->with('success', 'Nuovo impegno inserito correttamente');
    }

    public function edit() {
        return view('todos.edit');
    }
}
