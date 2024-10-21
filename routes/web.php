<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [ProdutoController::class, 'home'])->name('pages.Home');

Route::get('/pagina-produto/{id}', [ProdutoController::class, 'show'])->name('pages.paginaproduto');


Route::get('/como-funciona', [ProdutoController::class, 'sobre'])->name('sobre');

Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create')->middleware('auth');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store')->middleware('auth');
Route::get('/marketplace', [ProdutoController::class, 'index'])->name('produto.marketplace');


Route::get('/artesoes', [UsuarioController::class, 'artesoes'])->name('pagina.artesoes');

Route::get('/usuario/{id}', [UsuarioController::class, 'paginaUsuario'])->name('pages.PaginaUsuario');



Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::get('/', [AuthController::class, 'editarPerfil'])->name('pages.EditarPerfil');

Route::get('/editar-perfil', [UsuarioController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/atualizar-perfil', [UsuarioController::class, 'update'])->name('user.update')->middleware('auth');


Route::get('/meu-perfil', [AuthController::class, 'profile'])->name('user.profile')->middleware('auth');

Route::get('/artesoes', [UsuarioController::class, 'artesoes'])->name('pagina.artesoes');

Route::post('/usuario/{perfil}', [UsuarioController::class, 'armazenarComentario'])->middleware('auth');

Route::post('/perfil/{perfil}/armazenarcomentario', [UsuarioController::class, 'armazenarComentario'])->name('perfil.armazenarcomentario');

