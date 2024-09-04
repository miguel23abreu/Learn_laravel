<!-- <h1>Novo usuário</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf()
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" id="senha">
    <button type="submit">Enviar</button>
    
</form> -->

@extends('admin.layouts.app')
@section('title', 'Criar Novo Usuário')
@section('content')

    
    <h1>Novo usuário</h1>

    {{-- @include( 'admin.includes.alerts') --}}

    <x-alert/>      <!-- Outra forma de incluir alerts -->
        <form action="{{ route('users.store') }}" method="POST">
            @csrf()     <!-- token de formulário  -->
            <input type="text" name="name" placeholder="Nome" value="{{old('name')}}">
            <input type="text" name="email" placeholder="E-mail" value ="{{old('email')}}">
            <input type="password" name="password" placeholder="senha">
            <button type="submit">Enviar</button>
        </form>
@endsection    