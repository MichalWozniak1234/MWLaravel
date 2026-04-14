<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternalEventsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomeController::class, "index"]);
Route::get("/internal-events",[InternalEventsController::class, "index"]);
Route::get("/internal-events/create",[InternalEventsController::class, "createNew"]);
Route::post("/internal-events/create",[InternalEventsController::class, "addToDB"]);

Route::get("/tasks", [TasksController::class, "index"]);
Route::get("/tasks/create", [TasksController::class, "create"]);
Route::post("/tasks/create", [TasksController::class, "store"]);
Route::get("/tasks/{id}", [TasksController::class, "show"]);
Route::get("/tasks/{id}/edit", [TasksController::class, "edit"]);
Route::put("/tasks/{id}", [TasksController::class, "update"]);
Route::delete("/tasks/{id}", [TasksController::class, "destroy"]);
