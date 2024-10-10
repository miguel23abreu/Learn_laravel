@extends('admin.layouts.app')
@section('title', 'Listagem dos usuários')

@section('content')
<h1>Usuários</h1>


    <a href="{{route('users.create')}}">Adicionar usuários</a> <!-- para criar links para outras rotas, é melhor utilizar o método route-->

    <x-alert/>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- A seguir é mostrado a diretivas, seguido do "@", elas servem somente para mostrar dados -->
            <!-- @foreach ($users as $user) 
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>-</td>
                </tr>
            @endforeach -->

            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <a href="{{ route('users.show', $user->id) }}">detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum usuário no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$users->links()}}

@endsection