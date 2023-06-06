<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\RecordController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// rotte api dei progetti
Route::get('records', [RecordController::class, 'index']);
Route::get('records/{slug}', [RecordController::class, 'show']);

// rotte api dei types
Route::get('types', [TypeController::class, 'index']);
Route::get('types/{slug}', [TypeController::class, 'show']);

// rotte api delle technologies
Route::get('technologies', [TechnologyController::class, 'index']);
Route::get('technologies/{slug}', [TechnologyController::class, 'show']);

// rotte api delle leads
Route::post('leads', [LeadController::class, 'store']);