<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::first();
        //return 'UserController@index';
        // return $user->name;
        //return "Olá {$user->name}!";
        //return view('admin/users/index', ['user' => $user]);
        return view('admin/users/index', compact('user')); //utilizando o compact ele já irá utilizar o $user que foi declarado na linha 12, da qual se refere ao dado
    }
}
