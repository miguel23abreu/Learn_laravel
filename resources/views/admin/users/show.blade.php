@extends('admin.Layouts.app')
@section('title', 'Detalhes do Usuário')    
@section('content')
    <h1>Detalhes do Usuário</h1>
    <ul>
        <li>Nome: {{$user->name}}</li>
        <li>E-mail: {{$user->email}}</li>
    </ul>
    <x-alert/>
    <form action="{{ route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Deletar Usuário</button>
    </form>
@endsection