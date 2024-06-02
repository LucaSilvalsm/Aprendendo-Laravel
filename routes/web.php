<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|
| Aqui é onde você pode registrar rotas da web para sua aplicação. Esses
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| ser atribuído ao grupo de middleware "web". Faça algo ótimo!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Usuario
Route::get('/index-usuario', [Usuario::class, 'index'])->name('usuario.index');
Route::get('/create-usuario', [Usuario::class, 'create'])->name('usuario.create');
Route::post('/store-usuario', [Usuario::class, 'store'])->name('usuario.store');
Route::get('/show-usuario/{usuario}', [Usuario::class, 'show'])->name('usuario.show');
Route::get('/edit-usuario/{usuario}', [Usuario::class, 'edit'])->name('usuario.edit');
Route::put('/update-usuario/{usuario}', [Usuario::class, 'update'])->name('usuario.update');
Route::delete('/destroy-usuario/{usuario}', [Usuario::class, 'destroy'])->name('usuario.destroy');



