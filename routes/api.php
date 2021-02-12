<?php

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function () {
    $response = lpApiResponse(true, 'Route not found.');
    return response()->json($response, Response::HTTP_NOT_FOUND);
});

Route::prefix('v1')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::get('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
});
