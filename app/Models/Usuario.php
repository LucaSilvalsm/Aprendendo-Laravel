<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = ['nome', 'sobrenome', 'telefone', 'email', 'senha'];

    public static function listar(int $limit) // uso isso aqui para chamar a API, aqui é gerado o arquivo JSON 
    {
        return self::select([
            "id",
            "nome",
            "sobrenome",
            "telefone",
            "email",
            "senha"
        ])->limit($limit)->get();

    }

    public function setSenhaAttribute($password) // para deixar a senha hash e deixa ele de forma mais segura
    {
        $this->attributes['senha'] = Hash::make($password);
    }
}
