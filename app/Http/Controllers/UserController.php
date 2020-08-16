<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index() {

        //CRUD CON IL MODEL (eloquent ORM)
        //create
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
        // $user = User::all();
        // return $user;


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
