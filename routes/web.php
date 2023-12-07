<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PDFController;

//Route::view('/','inicio')->name('home');
//Route::view('/inicio','inicio')->name('inicio');
Route::view('/inactivo','Equipos.Inactivos')->name('Equipos.inac');

//agenda
Route::get('/agenda', [EventoController::class, 'index'])->name('agenda');
Route::get('/agenda/mostrar', [EventoController::class, 'show']);
Route::post('/agenda/agregar',[EventoController::class,'store']);
Route::post('/agenda/editar/{id}',[EventoController::class,'edit']);
Route::post('/agenda/actualizar/{evento}',[EventoController::class,'update']);
Route::post('/agenda/borrar/{id}',[EventoController::class,'destroy']);

//Asistencia
Route::get('asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index')->middleware('auth');
Route::post('asistencia/crear', [AsistenciaController::class, 'agregar_asistencia'])->name('asistencia.crear')->middleware('auth');
Route::post('asistencia/eliminar', [AsistenciaController::class, 'eliminar_asistencia'])->name('asistencia.eliminar')->middleware('auth');
Route::post('asistencia/editar', [AsistenciaController::class, 'editar_asistencia'])->name('asistencia.editar')->middleware('auth');




//Equipos
/*Route::get('/equipos', [EquiposController::class, 'index']) ->name('equipos');
Route::view('/inactivo','Equipos.Inactivos')->name('Equipos.inac');*/
Route::resource('equipos',EquiposController::class)->names([
    'index' => 'equipos'
])->middleware('auth');

//Mantenimiento
Route::resource('Mantenimiento',MantenimientoController::class)->names([
    'index'=> 'mantenimiento'
])->middleware('auth');



Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
Route::get('/login', [SessionsController::class, 'create'])->name('login.index');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

//pdf
Route::get("/equipopdf",[PDFController::class,"pdf"])->name("equiposPDF.pdf")->middleware('auth');
