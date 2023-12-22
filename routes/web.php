<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\RhController;
use App\Http\Controllers\site\RoomsController;
use App\Http\Controllers\site\JobsController;
use App\Http\Controllers\site\PatientsController;
use App\Http\Controllers\site\SpecializController;
use App\Http\Controllers\site\BlocksController;
use App\Http\Controllers\site\PharmaController;
use App\Http\Controllers\site\CatproductController;
use App\Http\Controllers\site\CompaniesController;

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


    Route::get('/adm/profissoes', [JobsController::class, 'index'])->name('jobs.index');
    Route::get('/adm/profissoes/adicionar', [JobsController::class, 'create'])->name('jobs.create');
    Route::post('/adm/profissoes/salvar', [JobsController::class, 'store'])->name('jobs.store');
    Route::get('/adm/profissoes/{job}', [JobsController::class, 'show'])->name('jobs.show');
    Route::get('/adm/profissoes/{job}/editar', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('/adm/profissoes/{job}/', [JobsController::class, 'update'])->name('jobs.update');
    Route::delete('/adm/profissoes/{job}/', [JobsController::class, 'destroy'])->name('jobs.destroy');


    Route::get('/adm/blocos', [BlocksController::class, 'index'])->name('blocks.index');
    Route::get('/adm/blocos/adicionar', [BlocksController::class, 'create'])->name('blocks.create');
    Route::post('/adm/blocos/salvar', [BlocksController::class, 'store'])->name('blocks.store');
    Route::get('/adm/blocos/{block}', [BlocksController::class, 'show'])->name('blocks.show');
    Route::get('/adm/blocos/{block}/editar', [BlocksController::class, 'edit'])->name('blocks.edit');
    Route::put('/adm/blocos/{block}/', [BlocksController::class, 'update'])->name('blocks.update');
    Route::delete('/adm/blocos/{block}/', [BlocksController::class, 'destroy'])->name('blocks.destroy');


    Route::get('/adm/especializacoes', [SpecializController::class, 'index'])->name('specializ.index');
    Route::get('/adm/especializacoes/adicionar', [SpecializController::class, 'create'])->name('specializ.create');
    Route::post('/adm/especializacoes/salvar', [SpecializController::class, 'store'])->name('specializ.store');
    Route::get('/adm/especializacoes/{specializ}', [SpecializController::class, 'show'])->name('specializ.show');
    Route::get('/adm/especializacoes/{specializ}/editar', [SpecializController::class, 'edit'])->name('specializ.edit');
    Route::put('/adm/especializacoes/{specializ}/', [SpecializController::class, 'update'])->name('specializ.update');
    Route::delete('/adm/especializacoes/{specializ}/', [SpecializController::class, 'destroy'])->name('specializ.destroy');



    Route::get('/pacientes', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/pacientes/adicionar', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/pacientes/salvar', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/pacientes/{patient}', [PatientsController::class, 'show'])->name('patients.show');
    Route::get('/pacientes/{patient}/editar', [PatientsController::class, 'edit'])->name('patients.edit');
    Route::put('/pacientes/{patient}/', [PatientsController::class, 'update'])->name('patients.update');
    Route::delete('/pacientes/{patient}/', [PatientsController::class, 'destroy'])->name('patients.destroy');

    Route::get('/farmacia', [PharmaController::class, 'index'])->name('pharma.index');
    Route::get('/farmacia/adicionar-produto', [PharmaController::class, 'create'])->name('pharma.create');
    Route::post('/farmacia/salvar-pruduto', [PharmaController::class, 'store'])->name('pharma.save');
    Route::get('/farmacia/exibir-produto/{product}', [PharmaController::class, 'show'])->name('pharma.product');
    Route::get('/farmacia/editar-product/{product}', [PharmaController::class, 'edit'])->name('pharma.edit');
    Route::put('/farmacia/atualizar-product/{product}', [PharmaController::class, 'update'])->name('pharma.update');
    Route::delete('/farmacia/excluir-product/{product}', [PharmaController::class, 'destroy'])->name('pharma.destroy');

    Route::get('/farmacia/companias/', [CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/farmacia/companias/adicionar', [CompaniesController::class, 'create'])->name('companies.create');
    Route::post('/farmacia/companias/salvar', [CompaniesController::class, 'store'])->name('companies.save');
    Route::get('/farmacia/companias/{company}', [CompaniesController::class, 'show'])->name('companies.product');
    Route::get('/farmacia/companias/editar/{company}', [CompaniesController::class, 'edit'])->name('companies.edit');
    Route::put('/farmacia/companias/atualizar/{company}', [CompaniesController::class, 'update'])->name('companies.update');
    Route::delete('/farmacia/companias/excluir/{company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');

});
