<?php

use App\Http\Controllers\BilheteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SorteioController;
use Illuminate\Support\Facades\Route;

Route::get('/erro', function () {
    return view('erro');
});
Route::get('/Politica', function () {
    return view('Politica');
});
Route::get('/TermoUso', function () {
    return view('TermoUso');
});


Route::get('/', [SiteController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/adm/depositar', function () {
        return view('/adm/depositar');
    });

    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/adm/update_usuarios/{id}', [SiteController::class, 'index'])->name('update_usuarios');
    Route::post('AtualizarTipoUsuario', [SiteController::class, 'AtualizarTipoUsuario'])->name('AtualizarTipoUsuario');
    Route::get('/adm/usuarios', [SiteController::class, 'usuarios'])->name('usuarios');

    //area do sorteio
    Route::get('/adm/sorteio', [SiteController::class, 'sorteio'])->name('sorteio');
    Route::post('/CasdastroSorteio', [SorteioController::class, 'CasdastroSorteio'])->name('CasdastroSorteio');

    //apostar
    Route::post('/apostar', [SiteController::class, 'apostar'])->name('apostar');
    
    //area do bilhete
    Route::post('/GerarBilhete', [BilheteController::class, 'GerarBilhete'])->name('GerarBilhete');
    Route::post('/SortearBilhete', [BilheteController::class, 'SortearBilhete'])->name('SortearBilhete');
    Route::get('/bilhete', [SiteController::class, 'bilhete'])->name('bilhete');
});

require __DIR__.'/auth.php';
