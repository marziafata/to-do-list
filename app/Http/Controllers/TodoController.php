<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function __construct() {
        $this->middleware('auth'); //->except('index') oppure ->only('index')
    }

    public function index() {
        $todos = Todo::orderBy('completed')->get(); //get prende comunque tutto come all()
        // se volessi le cose completate all'inizio ('completed', 'desc') per cambiare l'ordine
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

    public function update(StoreBlogPost $request, Todo $todo) {

        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('success', 'Hai aggiornato la nota!');
        //update to do
    }

    public function complete(Todo $todo) {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('success', 'Continua così!');
    }

    public function incomplete(Todo $todo) {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('error', 'Ce la farai domani!');
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back()->with('success', 'Nota cancellata!');
    }
}
