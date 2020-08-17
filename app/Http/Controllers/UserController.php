<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{

    public function uploadAvatar(Request $request) {

        if ($request->hasFile('image')) {

            $filename = $request->image->getClientOriginalName();
            //richiamo la funzione che cancella gli avatar precedenti
            //se l'avatar è già presente, cancellalo
            $this->deleteOldImage();
            //carica l'avatar (se è presente lo cancella e carica la nuova foto, se non è presente carica la foto e basta)
            $request->image->storeAs('image', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }

        return redirect()->back();
    }

    // funzione per sovrascrivere i vecchi avatar
    // se avatar già presente, cancellalo
    protected function deleteOldImage() {
        if (auth()->user()->avatar){
            Storage::delete('/public/image/' . auth()->user()->avatar);
        }
    }

    public function index() {

        //CRUD CON IL MODEL (eloquent ORM)
        //create


        $data = [//tutti questi dati devono venire dal form
            'name' => 'Luca',
            'email' => 'luca@gmail.com',
            'password' => bcrypt('password')
        ];

        // User::create($data);

        // $user = new User();
        // $user->name = 'marzia';
        // $user->email = 'marziafata@icloud.com';
        // $user->password = bcrypt('password');
        // $user->save();

         //delete
        // User::where('id', 2)->delete();

        //update
        // User::where('id', 6)->update(['name' => 'pociacchi']);

        //Read
        $user = User::all();
        return $user;


        //CRUD CON RAW QUERY
        //(Create)
        // DB::insert('insert into users (name,email,password) values(?,?,?)',
        // [
        //     'marzia',
        //     'marziafata@icloud.com',
        //     'password'
        // ]);

        //(update)
        // DB::update('update users set name = ? where id = 1',
        // ['fiocchidicotone']);

        //(delete)
        // DB::delete('delete from users where id = 1');

        //(read)
        // $users = DB::select('select * from users');
        // return $users;

        return view('home');
    }
}
