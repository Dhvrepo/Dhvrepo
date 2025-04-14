<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventApiController;

Route::middleware('api')->group(function () {
    // GET: Categorized events (today, future, past)
    Route::get('/events', [EventApiController::class, 'index']);

    // GET: All events
    Route::get('/events/all', [EventApiController::class, 'apiIndex']);

    // POST: Store new event
    Route::post('/events', [EventApiController::class, 'apiStore']);

    // PUT: Update existing event
    Route::put('/events/{id}', [EventApiController::class, 'apiUpdate']);

    // DELETE: Delete an event
    Route::delete('/events/{id}', [EventApiController::class, 'apiDestroy']);
    
    // Today
    
    Route::get('/today', [EventApiController::class, 'getToday']);
    Route::post('/today', [EventApiController::class, 'storeToday']);
    Route::put('/today/{id}', [EventApiController::class, 'updateToday']);
    Route::delete('/today/{id}', [EventApiController::class, 'destroyToday']);


    Route::get('/past', [EventApiController::class, 'getPast']);
    Route::post('/past', [EventApiController::class, 'storePast']);
    Route::put('/past/{id}', [EventApiController::class, 'updatePast']);
    Route::delete('/past/{id}', [EventApiController::class, 'destroyPast']);


   // =============================
   // Future Events CRUD
   // =============================
   Route::get('/future', [EventApiController::class, 'getFuture']);
   Route::post('/future', [EventApiController::class, 'storeFuture']);
   Route::put('/future/{id}', [EventApiController::class, 'updateFuture']);
   Route::delete('/future/{id}', [EventApiController::class, 'destroyFuture']);
   
   
});



