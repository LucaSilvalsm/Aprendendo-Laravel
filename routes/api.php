<?php


use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsuarioAPI;

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

Route::prefix('v1')->group(function() {
    Route::get('lista', function() {
        return Usuario::listar(10);
    });


    Route::post('cadastra', [UsuarioAPI::class, 'salvar']);
    // Corrija a referência ao método salvar()
});
Route::prefix('v2')->group(function() {

});
