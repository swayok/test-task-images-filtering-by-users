<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\AccessByTokenMiddleware;
use Illuminate\Support\Facades\Route;

// user area
Route::get('/', [FrontendController::class, 'index']);

Route::get('api/images', [FrontendController::class, 'getImages']);
Route::post('api/image/{id}/accept', [FrontendController::class, 'acceptImage'])
    ->where('id', '^\d+$');
Route::post('api/image/{id}/reject', [FrontendController::class, 'rejectImage'])
    ->where('id', '^\d+$');

// admin area
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => AccessByTokenMiddleware::class,
    ],
    function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::get('api/images', [AdminController::class, 'getImages']);
        Route::delete('api/image/{id}', [AdminController::class, 'deleteImage'])
            ->where('id', '^\d+$');
    }
);

