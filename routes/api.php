<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;

Route::get('/leads', [LeadController::class, 'index']);
Route::get('/leads/{id}', [LeadController::class, 'show']);
Route::post('/leads', [LeadController::class, 'store']);
