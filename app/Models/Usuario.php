<?php

namespace App\Models;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = ['nome', 'sobrenome', 'telefone', 'email', 'senha'];

    public static function listar()
    {
        return self::select([
            "id",
            "nome",
            "sobrenome",
            "telefone",
            "email",
            "senha"
        ])->get();
    }

    public function setSenhaAttribute($password) // para deixar a senha hash e deixa ele de forma mais segura
    {
        $this->attributes['senha'] = Hash::make($password);
    }

    public static function getById($id)
    {
        if ($id) {
            return self::findOrFail($id);
        } else {
            return response()->json(['error' => 'Erro ao acessar a página. Este caminho não existe.'], 404);
        }
    }

    public static function getByUpdate($id)
    {
        if ($id) {
            // Fetch the user record with the given ID
            $usuario = self::findOrFail($id);

            // Check for update request (assuming form submission)
            if (Request::isMethod('post')) {
                $usuarioRequest = new UsuarioRequest(Request::all()); // Create a request instance

                // Validate the update data
                $validatedData = $usuarioRequest->validated();

                // Update attributes based on validated data (excluding password for now)
                $usuario->update($validatedData);

                // Handle password update separately (if applicable)
                if (isset($validatedData['senha'])) {
                    $usuario->senha = Hash::make($validatedData['senha']);
                    $usuario->save(); // Save with hashed password
                } else {
                    // Save without updating password
                    $usuario->save();
                }

                // Return a success message or redirect to a success page
                return response()->json(['success' => 'Usuário atualizado com sucesso!']);
            } else {
                // Return the user record for update form pre-filling
                return $usuario;
            }
        } else {
            return response()->json(['error' => 'Erro ao acessar o usuário para atualização. ID inválido.'], 404);
        }
    }

    public function create(UsuarioRequest $usuarioRequest)
    {
        $usuarioRequest->validate([
            'id' => 'required',
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'senha' => 'required'
        ]);

        return response()->json($usuarioRequest->all());
    }
}
