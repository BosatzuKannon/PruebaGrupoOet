<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PeopleController;

//Route::get('/', function () { return view('index');})->name('index');
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/role', [RoleController::class, 'store'])->name('role');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role-destroy');

Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle');
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('vehicle-destroy');

Route::get('/brand', [BrandController::class, 'index'])->name('brand');
Route::post('/brand', [BrandController::class, 'store'])->name('brand');
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand-destroy');

Route::get('/document', [DocumentController::class, 'index'])->name('document');
Route::post('/document', [DocumentController::class, 'store'])->name('document');
Route::delete('/document/{id}', [DocumentController::class, 'destroy'])->name('document-destroy');

Route::get('/people', [PeopleController::class, 'index'])->name('people');
Route::post('/people', [PeopleController::class, 'store'])->name('people');

Route::get('/vehicles', [VehiclesController::class, 'index'])->name('vehicles');
Route::post('/vehicles', [VehiclesController::class, 'store'])->name('vehicles');