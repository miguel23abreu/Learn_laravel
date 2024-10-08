<!-- <h1>Novo usuário</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf()
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" id="senha">
    <button type="submit">Enviar</button>
    
</form> -->

@extends('admin.layouts.app')
@section('title', 'Editar dados do Usuário')
@section('content')

    
    <h1>Editar Usuáro {{@$user->name}}</h1>

    {{-- @include( 'admin.includes.alerts') --}}

    <x-alert/>      <!-- Outra forma de incluir alerts -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            
            <!-- <input type="text" name="_method" value="PUT"> -->
            @method('PUT')
            @include('admin.users.partials.form')
        </form>
@endsection    