<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('', [\App\Http\Controllers\IssuesController::class, 'index']);
Route::get('{id}', [\App\Http\Controllers\IssuesController::class, 'view']);
Route::post('create', [\App\Http\Controllers\IssuesController::class, 'store']);
Route::put('edit/{id}', [\App\Http\Controllers\IssuesController::class, 'update']);
Route::delete('delete/{id}', [\App\Http\Controllers\IssuesController::class, 'delete']);
