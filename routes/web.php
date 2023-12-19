<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\RhController;
use App\Http\Controllers\site\RoomsController;
use App\Http\Controllers\site\JobsController;
use App\Http\Controllers\site\PatientsController;

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

    Route::get('/salas', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('/salas/adm', [RoomsController::class, 'adm'])->name('rooms.adm');
    Route::get('/salas/adicionar', [RoomsController::class, 'create'])->name('rooms.create');
    Route::post('/salas/salvar', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('/salas/{room}', [RoomsController::class, 'show'])->name('rooms.show');
    Route::get('/salas/{room}/editar', [RoomsController::class, 'edit'])->name('rooms.edit');
    Route::get('/salas/{room}/comfirm', [RoomsController::class, 'confirm'])->name('rooms.confirm');
    Route::put('/salas/{room}/', [RoomsController::class, 'update'])->name('rooms.update');
    Route::delete('/salas/{room}/', [RoomsController::class, 'destroy'])->name('rooms.destroy');


    Route::get('/profissoes', [JobsController::class, 'index'])->name('jobs.index');
    Route::get('/profissoes/adicionar', [JobsController::class, 'create'])->name('jobs.create');
    Route::post('/profissoes/salvar', [JobsController::class, 'store'])->name('jobs.store');
    Route::get('/profissoes/{job}', [JobsController::class, 'show'])->name('jobs.show');
    Route::get('/profissoes/{job}/editar', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('/profissoes/{job}/', [JobsController::class, 'update'])->name('jobs.update');
    Route::delete('/profissoes/{job}/', [JobsController::class, 'destroy'])->name('jobs.destroy');


    Route::get('/pacientes', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/pacientes/adicionar', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/pacientes/salvar', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/pacientes/{patient}', [PatientsController::class, 'show'])->name('patients.show');
    Route::get('/pacientes/{patient}/editar', [PatientsController::class, 'edit'])->name('patients.edit');
    Route::put('/pacientes/{patient}/', [PatientsController::class, 'update'])->name('patients.update');
    Route::delete('/pacientes/{patient}/', [PatientsController::class, 'destroy'])->name('patients.destroy');
});
