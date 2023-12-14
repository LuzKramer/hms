<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\RhController;
use App\Http\Controllers\site\RoomsController;

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

Route::namespace(value: 'site')->group(function () {


    Route::get('/', function () {
        return view('home.home');
    });



    Route::get('/rh', [RhController::class, 'index'])->name('rh.index');

    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/adicionar', [RoomsController::class, 'create'])->name('rooms.create');
    Route::post('/rooms/salvar', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}', [RoomsController::class, 'show'])->name('rooms.show');
    Route::get('/rooms/{room}/editar', [RoomsController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}/', [RoomsController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{room}/', [RoomsController::class, 'destroy'])->name('rooms.destroy');
});
