<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\SalaController;

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

/**
 * Get Routes
 */
Route::get('/', [ HomeController::class, 'show' ]);
Route::get('/participantes', [ ParticipanteController::class, 'show' ] )->name( 'participantes' );
Route::get('/salas', [ SalaController::class, 'show' ] )->name( 'salas' );
Route::get('/cafes', [ CafeController::class, 'show' ] )->name( 'cafes' );
Route::get('/participantes/novo', function () {
    return view( 'cadParticipante' );
});
Route::get('/cafes/novo', function () {
    return view( 'cadCafe' );
});
Route::get('/salas/novo', function () {
    return view( 'cadSala' );
});
Route::get('/cafes/info/{id}', [ CafeController::class, 'query' ]);
Route::get('/participantes/info/{id}', [ ParticipanteController::class, 'query' ]);
Route::get('/salas/info/{id}', [ SalaController::class, 'query' ]);
Route::get('/participantes/excluir/{id}', [ ParticipanteController::class, 'delete' ]);

/**
 * Post Routes
 */
Route::post( '/participantes/novo', [ ParticipanteController::class, 'store' ] )->name( 'registrarParticipante' );
Route::post( '/salas/novo', [ SalaController::class, 'store' ] )->name( 'registrarSala' );
Route::post( '/cafes/novo', [ CafeController::class, 'store' ] )->name( 'registrarCafe' );

/**
 * Delete Routes
 */
Route::get('/participantes/excluir/{id}/confirmar', [ ParticipanteController::class, 'confirmDelete' ]);
