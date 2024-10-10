<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ProfileUpdateRequest;
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

    public function store(StoreUserRequest $request){
        // $user =  new User;
        // $user->name = "carlos";
        // $user->email = "carlos@gmail.com";
        // $user->password = "123456";
        //dd($request->except("_token"));
        //dd($request->except("_token")); //vai retornar todas os atributos exceto _token
        //dd($request->only("_token")); //vai retornar todos somente o atributo _token
        //dd($request->all()); //vai retornar todos os elementos 
        //dd($request->get("_token")); //vai retornar somente o atributo _token
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário cadastrado com sucesso');
    }


    public function edit(string $id){
            // $user = User::where( 'id', '=', $id)->first(); //usa-se o método first() para retornar um único registro ou null
            // $user = User::where( 'id', $id)->first(); //quando se remove o '=' vai retornar a mesma coisa, pois por padrão a comparação de '=' já é utilizada
            //também pode ser utilizado ao invés de ->first() o ->firstOrFail(), deste modo será retornado um único registro ou um erro 404, que é recomendado para APIs
            //$user = User::find($id); //ao utilizar este método, será retornado um único valor ou um valor null como é o caso dos exemplos acima
            if(!($user = User::find($id))){
                return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
            }

            return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id){
        if(!($user = User::find($id))){
            return back()->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');
        if($request->password) {                            //
            $data['password'] = bcrypt($request->password); // modo de criptografar a senha
        }                                                   //
        $user->update($data);
        dd($data);
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário editado com sucesso');
    }

    public function show(string $id){
        if(!($user = User::find($id))){ // User::find($id) serve para encontrar um registro ou null 
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado'); // retorna uma mensagem de erro
        }

        return view('admin.users.show', compact('user')); 
    }

    public function destroy(string $id){
        if(!($user = User::find($id))){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        if(auth()->user()->id === $user->id){
            return back()->with('message', 'você não pode deletar o seu próprio perfil');
        }
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário deletado com sucesso');
    }
}
