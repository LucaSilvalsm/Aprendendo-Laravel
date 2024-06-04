<?php


use App\Models\Usuario;
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
Route::get('usuario', [Usuario::class, 'listar']); // retorna todos os usuarios
Route::get('usuario/{id}',[Usuario::class,'getById']); // retornar ele pelo ID
Route::post('usuario/store',[Usuario::class,'create']); // criando um usuario
Route::put('usuario/update/{id}',[Usuario::class,'getByUpdate']); // atualizar o Cadastro



