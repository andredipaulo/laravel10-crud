<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group( function () {
    Route::get('/', [ProdutosController::class, 'index'] )->name('produtos');
    Route::get('/create', [ProdutosController::class, 'create'] )->name('produto.novo');
    Route::post('/store', [ProdutosController::class, 'store'] )->name('produto.gravar');
    Route::get('/edit/{id}', [ProdutosController::class, 'edit'] )->name('produto.alterar');
    Route::put('/update/{id}', [ProdutosController::class, 'update'] )->name('produto.atualizar');
    Route::delete('/destroy', [ProdutosController::class, 'destroy'] )->name('produto.destroy');
});

Route::resource('clientes', ClientesController::class);