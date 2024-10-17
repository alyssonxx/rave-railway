<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/register', function () {
    return view('pages.registro');
});
Route::get('/marketplace', function () {
    return view('pages.Marketplace');
});
Route::get('/pagina-produto', function () {
    return view('pages.paginaproduto');
});
Route::get('/usuario', function () {
    return view('pages.PaginaUsuario');
});
Route::get('/criacao-produto', function () {
    return view('pages.criacaoproduto');
});
// Route::get('/url', function () {
//     return view('pages.url');
// });

