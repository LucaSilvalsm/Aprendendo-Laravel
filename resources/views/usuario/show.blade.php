<div>
    @extends('layouts.admin')
    @section('content')

        <h2>Detalhe da Conta</h2>

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
        <hr>
        <div class="logo">
            <img src="{{ asset('img/user.png') }}" alt="logoUsuario"> {{-- o asset aponta para a pasta public que eu pego o endereço da pasta img/user.png --}}
        </div>
        ID: {{ $usuario->id }} <br>
        Nome: {{ $usuario->nome }} <br>
        Sobrenome: {{ $usuario->sobrenome }} <br>
        Telefone: {{ $usuario->telefone }} <br>
        Email: {{ $usuario->email }} <br> <br>
        <button> <a href="{{ route('usuario.index') }}">Lista</a>
        </button> <br> <br>
        <button><a href="{{ route('usuario.edit',['usuario'=>$usuario->id])}}">Editar</a> </button>
        <hr>
    </div>
@endsection
