<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //$users = User::get(); //também oide ser utilizado o método all() para que seja listado todos os usuarios
        $users = User::paginate(25); //comando util para mostrar a quantidade de usuarios por pagina na pagina users 
        //dd($users); //debugar variáveis 
        //return 'UserController@index';
        // return $user->name;
        //return "Olá {$user->name}!";
        //return view('admin/users/index', ['user' => $user]);
        return view('admin.users.index', compact('users')); //utilizando o compact ele já irá utilizar o $user que foi declarado na linha 12, da qual se refere ao dado
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        // $user =  new User;
        // $user->name = "carlos";
        // $user->email = "carlos@gmail.com";
        // $user->password = "123456";
        //dd($request->except("_token"));
        //dd($request->except("_token")); //vai retornar todas os atributos exceto _token
        //dd($request->only("_token")); //vai retornar todos somente o atributo _token
        //dd($request->all()); //vai retornar todos os elementos 
        //dd($request->get("_token")); //vai retornar somente o atributo _token
        User::create($request->all());

        return redirect()->route('users.index');
    }
}
