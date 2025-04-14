<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
    return view('welcome');
});


Route::prefix('admin')->group(function () {

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');


Route::get('/pastevents', [EventController::class, 'indexPast'])->name('events.past');
Route::get('/pastevents/create', [EventController::class, 'createPast'])->name('events.past.create');
Route::post('/pastevents', [EventController::class, 'storePast'])->name('events.past.store');
Route::get('/pastevents/{event}/edit', [EventController::class, 'editPast'])->name('events.past.edit');
Route::put('/pastevents/{event}', [EventController::class, 'updatePast'])->name('events.past.update');
Route::delete('/pastevents/{event}', [EventController::class, 'destroyPast'])->name('events.past.destroy');

Route::get('/futureevents', [EventController::class, 'future'])->name('events.future');
Route::get('/futureevents/create', [EventController::class, 'createFuture'])->name('events.future.create');
Route::post('/futureevents', [EventController::class, 'storeFuture'])->name('events.future.store');
Route::get('/futureevents/{event}/edit', [EventController::class, 'editFuture'])->name('events.future.edit');
Route::put('/futureevents/{event}', [EventController::class, 'updateFuture'])->name('events.future.update');
Route::delete('/futureevents/{event}', [EventController::class, 'destroyFuture'])->name('events.future.destroy');

});
