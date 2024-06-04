<?php

use App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('usuario', [Usuario::class, 'apiIndex']); // retorna todos os usuarios
Route::get('usuario/{id}',[Usuario::class,'apiShow']); // retornar ele pelo ID
Route::post('usuario/store',[Usuario::class,'apiStore']); // criando um usuario
Route::put('usuario/update/{id}',[Usuario::class,'apiUpdate']); // atualizar o Cadastro
Route::delete('usuario/{id}', [Usuario::class, 'apiDestroy']); // Deletar o usuario pelo ID



