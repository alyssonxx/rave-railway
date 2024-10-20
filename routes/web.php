<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;

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

Route::get('/usuario', function () {
    return view('pages.PaginaUsuario');
});

Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/marketplace', [ProdutoController::class, 'index'])->name('produto.marketplace');
Route::get('/pagina_do_usuario',[UsuarioController::class, 'paginaUsuario'])->name('pagina.usuario');



Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Protegendo a rota do dashboard para apenas usuários autenticados
Route::get('/dashboard', [AuthController::class, 'redirectHome'])->middleware('auth');


// Route::get('/', [AuthController::class, 'editarPerfil'])->name('pages.EditarPerfil');
Route::get('/user/edit/{id}', [AuthController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [AuthController::class, 'update'])->name('user.update');