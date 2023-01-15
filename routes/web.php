<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);

Route::get('api/images', [FrontendController::class, 'getImages']);

Route::post('api/image/{id}/accept', [FrontendController::class, 'acceptImage'])
    ->where('id', '^\d+$');
Route::post('api/image/{id}/reject', [FrontendController::class, 'rejectImage'])
    ->where('id', '^\d+$');

