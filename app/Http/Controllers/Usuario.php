<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario as ModelsUsuario;

use Illuminate\Support\Facades\Hash; // Adicionando a importação do Hash

class Usuario extends Controller
{
    /**
     * Carregas os usuario
     */
    public function index()
    {
        // Recuperar os registros do banco
        $usuarios = ModelsUsuario::orderBy('id')->get();
        //   dd($usuarios);  Aqui você pode verificar os registros antes de retornar a view
        return view('usuario.index', ['usuarios' => $usuarios]);

    }


    public function create()
    {   // store the new account registration form
        // carregar o form do cadastro da nova conta
        return view('usuario.create');
    }

    /**
     */
    public function store(UsuarioRequest $request)
    {
        // cadastrando o usuario
        // Validando o Form
        $request->validated();
        $request->validate($request->rulesForCreate(), $request->messages());
        // Verificando se a senha e a confirmação de senha são iguais
        if ($request->senha !== $request->confirmacaoSenha) {
            return redirect()->back()->withErrors(['confirmacaoSenha' => 'As senhas não coincidem.'])->withInput();
        }
        // Hashear a senha antes de salvar
        $request->merge([
            'senha' => Hash::make($request->senha)
        ]);

        // Cadastrando no banco de dados a nova conta
        $usuario = ModelsUsuario::create($request->all());

        return redirect()->route('usuario.show', ['usuario' => $usuario->id])->with('success', 'Conta cadastrada com sucesso');
    }
    /**
     */
    public function show(ModelsUsuario $usuario)
    {
        // USER DETAILS
        // detalhes do usuario

        return view('usuario.show', ['usuario' => $usuario]);
    }

    /**
     */
    public function edit(ModelsUsuario $usuario)
    {
        // Carrega o form de editar a conta
        // Load the form to edit the account

        return view('usuario.edit', ['usuario' => $usuario]);
    }
    /**
     * atualizar os dados
     */
    public function update(UsuarioRequest $request, ModelsUsuario $usuario)
    {
        // Verifica se os campos de senha estão presentes na solicitação
        if ($request->has('senha')) {
            // Se os campos de senha estão presentes, aplicamos as regras de criação
            $request->validate($request->rulesForCreate(), $request->messages());
        } else {
            // Caso contrário, aplicamos as regras de atualização
            $request->validate($request->rulesForUpdate(), $request->messages());
        }

        // Atualizar as informação para o Banco de Dados
       $usuario->update([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'telefone' => $request->telefone,
            'email' => $request->email,

       ]);
       // Redireciona o usuario e exibe a mensagem de sucesso
       return redirect()->route('usuario.show', ['usuario' => $usuario->id])->with('success', 'Conta atualizada com sucesso');


    }

    /**
     * deletar o usuario
     */
    public function destroy(ModelsUsuario $usuario)
    {
        // apaga os dados do usuario
        // delete user data
        $usuario ->delete();
        return redirect()->route('usuario.index')->with('success', 'Conta apagada com sucesso');

    }
}
