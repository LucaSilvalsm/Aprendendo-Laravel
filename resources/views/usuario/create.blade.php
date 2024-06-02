<div>

    <a href="{{ route('usuario.index') }}">Voltar</a>

    <h2>Criando Conta</h2>

    @if ($errors->any())

        <span style="color: red">
            @foreach ($errors->all() as $error )
                {{ $error }} <br>
            @endforeach

        </span>
        <br>
        @if (session('success'))
        <span style="color: #082">
            {{ session('success') }}
        </span> <br>
    @endif

    @endif
    <br>
        {{-- value="{{ old('nome') }}" para manter o valor antigo caso o usuario preencha o form, mas não cadastra completo --}}
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="create">
        <label for="text">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do Usuario" value="{{ old('nome') }}" ><br> <br> {{--  --}}

        <label for="sobrenome">Sobrenome: </label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="sobrenome do Usuario" value="{{ old('sobrenome') }}" ><br> <br>

        <label for="telefone">Telefone: </label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone do Usuario" value="{{ old('telefone') }}"><br> <br>

        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="email do Usuario" value="{{ old('email') }}"  ><br> <br>

        <label for="senha">Senha: </label>
        <input type="password" id="senha" name="senha" value="{{ old('senha') }}"  > <br> <br>

        <label for="confirmacaoSenha">Confirme a senha : </label>
        <input type="password" id="confirmacaoSenha" name="confirmacaoSenha" value="{{ old('confirmacaoSenha') }}" > <br>
        <br>

        <button type="submit">Cadastrar</button>




    </form>

</div>
