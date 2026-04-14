<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternalEventsController;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomeController::class, "index"]);
Route::get("/internal-events",[InternalEventsController::class, "index"]);
Route::get("/internal-events/create",[InternalEventsController::class, "createNew"]);
Route::post("/internal-events/create",[InternalEventsController::class, "addToDB"]);
