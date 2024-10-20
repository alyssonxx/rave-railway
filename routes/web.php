<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Paginas
Route::get('/', function () {
    return view('pages.Home');
});
Route::get('/login', function () {
    return view('pages.Login');
});
Route::get('/register', function () {
    return view('pages.Registro');
});
Route::get('/pagina-produto/{id}', [ProdutoController::class, 'show'])->name('pages.paginaproduto');

Route::get('/usuario', function () {
    return view('pages.PaginaUsuario');
});

Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/marketplace', [ProdutoController::class, 'index'])->name('produto.marketplace');
Route::get('/pagina_do_usuario',[UsuarioController::class, 'paginaUsuario'])->name('pagina.usuario');


