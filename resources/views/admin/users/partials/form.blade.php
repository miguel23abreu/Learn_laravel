<x-alert/>

@csrf()     <!-- token de formulário  -->
<input type="text" name="name" placeholder="Nome" value="{{$user->name ?? old('name')}}">
<input type="text" name="email" placeholder="E-mail" value ="{{$user->email ??old('email')}}">
<input type="password" name="password" placeholder="senha">
<button type="submit">Enviar</button>