@extends('layouts.admin')
@section('content')
    <button><a href="{{ route('usuario.create') }}">Cadastrar</a></button>
    <h2>Lista de contato</h2><br>

    {{-- <a href="{{ route('usuario.show') }}">Visualizar</a> <br>
    <a href="{{ route('usuario.edit') }}">Editar</a> <br>
    <!-- <a href="{{ route('usuario.destroy') }}">Apagar</a> <br> -->
    --}}

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
    </div>
    @forelse ($usuarios as $usuario)
        <div class="logo">
            <img src="{{ asset('img/user.png') }}" alt="logoUsuario"> {{-- o asset aponta para a pasta public que eu pego o endereço da pasta img/user.png --}}
        </div>
        ID: {{ $usuario->id }} <br>
        Nome: {{ $usuario->nome }} <br>
        Sobrenome: {{ $usuario->sobrenome }} <br>
        Telefone: {{ $usuario->telefone }} <br>
        Email: {{ $usuario->email }} <br> <br>

        <button><a href="{{ route('usuario.show', ['usuario' => $usuario->id]) }}">Visualizar</a></button> <br> <br>
        <button><a href="{{ route('usuario.edit', ['usuario' => $usuario->id]) }}">Editar</a></button> <br> <br>
        <form action="{{ route('usuario.destroy', ['usuario' => $usuario->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar ?')">Apagar</button>
        </form>
        <hr>
    @empty
        <span style="color: red">
            Nenhum conta Encontrada
        </span>
    @endforelse
@endsection

<!-- BOOTSTRAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.js"
    integrity="sha512-KCgUnRzizZDFYoNEYmnqlo0PRE6rQkek9dE/oyIiCExStQ72O7GwIFfmPdkzk4OvZ/sbHKSLVeR4Gl3s7s679g=="
    crossorigin="anonymous"></script>
