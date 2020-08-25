<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Step;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;


class TodoController extends Controller
{

//*** costruttore middleware che filtra le autenticazioni

    public function __construct() {
        $this->middleware('auth'); //->except('index') oppure ->only('index')
    }

//*** funzione index mostra la lista delle risorse

    public function index() {

        // $todos = auth()->user()->todos()->orderBy('completed')->get(); get prende comunque tutto come all()
        // se volessi le cose completate all'inizio ('completed', 'desc') per cambiare l'ordine

        $todos = auth()->user()->todos->sortBy('completed'); //usiamo la collection

        return view('todos.index', compact('todos'));
    }

//*** funzione create mostra il form per creare una nuova risorsa

    public function create() {
        return view('todos.create');
    }

//*** funzione store archivia la nuova risorsa creata

    public function store(StoreBlogPost $request) {

        $todo = auth()->user()->todos()->create($request->all());

        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('success', 'Nuovo impegno inserito correttamente');
    }

    //*** funzione show mostra una risorsa specifica

    public function show(Todo $todo) {
        return view('todos.show', compact('todo'));
    }

    //*** funzione edit mostra il form per modificare una risorsa specifica

    public function edit(Todo $todo) {

        return view('todos.edit', compact('todo'));
    }

    //*** funzione update archivia le modifica a una specifica risorsa

    public function update(StoreBlogPost $request, Todo $todo) {

        $todo->update(['title' => $request->title]);

        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }

            }
        }

        return redirect(route('todo.index'))->with('success', 'Hai aggiornato la nota!');
        //update to do
    }

//*** funzione destroy cancella una specifica risorsa dal database

    public function destroy(Todo $todo) {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('success', 'Nota cancellata!');
    }

//*** funzione per mettere e togliere il flag

    public function complete(Todo $todo) {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('success', 'Continua così!');
    }

    public function incomplete(Todo $todo) {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('error', 'Ce la farai domani!');
    }

}
