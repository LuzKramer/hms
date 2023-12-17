<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\RhController;
use App\Http\Controllers\site\RoomsController;
use App\Http\Controllers\site\JobsController;

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


    Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/adicionar', [JobsController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/salvar', [JobsController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/editar', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}/', [JobsController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}/', [JobsController::class, 'destroy'])->name('jobs.destroy');
});
