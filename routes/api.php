<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use LaravelJsonApi\Laravel\Facades\JsonApiRoute;

use App\Http\Controllers\Api\V1\ThingController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

JsonApiRoute::server('v1')
    ->middleware('auth:sanctum', 'cache.headers:private;max_age=1;must_revalidate;etag')
    ->prefix('v1')
    ->resources(function ($server) {
        $server->resource('things', ThingController::class)->actions(function ($actions) {
            $actions->get('search');
        });
    });
