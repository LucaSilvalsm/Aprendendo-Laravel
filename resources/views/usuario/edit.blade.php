@if ($errors->any())

@if (session('success'))
    <div class="msg success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="msg error">
        {{ session('error') }}
    </div>
@endif

@endif
<div>
    <a href="{{ route('usuario.index') }}">Voltar</a>
    <h2>Editar a conta</h2>
</div>
<form action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="text">Nome: </label>
    <input type="text" name="nome" id="nome" placeholder="Nome do Usuario" value="{{ old('nome', $usuario->nome )}}" ><br> <br>

    <label for="sobrenome">Sobrenome: </label>
    <input type="text" name="sobrenome" id="sobrenome" placeholder="sobrenome do Usuario" value="{{ old('sobrenome', $usuario->sobrenome ) }}" ><br> <br>

    <label for="telefone">Telefone: </label>
    <input type="text" name="telefone" id="telefone" placeholder="Telefone do Usuario" value="{{ old('telefone', $usuario->telefone )}}"><br> <br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email" placeholder="email do Usuario" value="{{ old('email', $usuario->email )}}"  ><br> <br>


    <br>
    <button type="submit">Salvar</button>




</form>
