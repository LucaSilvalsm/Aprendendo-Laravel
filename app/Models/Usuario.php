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

 

    public function setSenhaAttribute($password) // para deixar a senha hash e deixa ele de forma mais segura
    {
        $this->attributes['senha'] = Hash::make($password);
    }

}
