<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\ThingResource;
use App\Http\Resources\ThingCollection;
use App\Models\Thing;

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

Route::get('/things', function () {
    return new ThingCollection(Thing::paginate());
});
Route::get('/things/{id}', function ($id) {
    return new ThingResource(Thing::findOrFail($id));
});
