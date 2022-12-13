<?php
declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MeController;

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

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/me', MeController::class);
// });

Route::post('/login',[App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout',[App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/createUser', [App\Http\Controllers\LoginController::class, 'createUser']);
