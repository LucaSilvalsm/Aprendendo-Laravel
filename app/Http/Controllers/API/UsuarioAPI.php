<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioAPI extends Controller
{
    //
    public function salvar(Request $request)
    {
        dd($request->all());
    }
}
