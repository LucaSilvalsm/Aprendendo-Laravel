<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario as ModelsUsuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Usuario extends Controller
{
    // Métodos para a interface web

    public function index()
    {
        $usuarios = ModelsUsuario::orderBy('id')->get();
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(UsuarioRequest $request)
    {
        $request->validated();
        $request->validate($request->rulesForCreate(), $request->messages());

        if ($request->senha !== $request->confirmacaoSenha) {
            return redirect()->back()->withErrors(['confirmacaoSenha' => 'As senhas não coincidem.'])->withInput();
        }

        $request->merge([
            'senha' => Hash::make($request->senha)
        ]);

        $usuario = ModelsUsuario::create($request->all());

        return redirect()->route('usuario.show', ['usuario' => $usuario->id])->with('success', 'Conta cadastrada com sucesso');
    }

    public function show(ModelsUsuario $usuario)
    {
        return view('usuario.show', ['usuario' => $usuario]);
    }

    public function edit(ModelsUsuario $usuario)
    {
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    public function update(UsuarioRequest $request, ModelsUsuario $usuario)
    {
        if ($request->has('senha')) {
            $request->validate($request->rulesForCreate(), $request->messages());
        } else {
            $request->validate($request->rulesForUpdate(), $request->messages());
        }

        $usuario->update([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        return redirect()->route('usuario.show', ['usuario' => $usuario->id])->with('success', 'Conta atualizada com sucesso');
    }

    public function destroy(ModelsUsuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index')->with('success', 'Conta apagada com sucesso');
    }

    //////////////////////////////////////// Métodos para a API ////////////////////////////////////////////////

    public function apiIndex()
    {
        $usuarios = ModelsUsuario::orderBy('id')->get();
        return response()->json($usuarios);
    }

    public function apiShow($id)
    {
        $usuario = ModelsUsuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function apiStore(UsuarioRequest $request)
    {
        $request->validated();
        $request->validate($request->rulesForCreate(), $request->messages());

        if ($request->senha !== $request->confirmacaoSenha) {
            return response()->json(['error' => 'As senhas não coincidem.'], 400);
        }

        $request->merge([
            'senha' => Hash::make($request->senha)
        ]);

        $usuario = ModelsUsuario::create($request->all());

        return response()->json($usuario, 201);
    }

    public function apiUpdate(UsuarioRequest $request, $id)
    {
        $usuario = ModelsUsuario::findOrFail($id);

        if ($request->has('senha')) {
            if ($request->senha !== $request->confirmacaoSenha) {
                return response()->json(['error' => 'As senhas não coincidem.'], 400);
            }
            $request->merge([
                'senha' => Hash::make($request->senha)
            ]);
        }

        $usuario->update($request->all());

        return response()->json($usuario);
    }

    public function apiDestroy($id)
    {
        $usuario = ModelsUsuario::findOrFail($id);
        $usuario->delete();
        return response()->json(['success' => 'Conta apagada com sucesso']);
    }
}
