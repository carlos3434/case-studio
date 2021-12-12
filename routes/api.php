<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\Auth\AuthController;
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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::prefix('v1')->group(function(){

    Route::get('/unauthorized', [AuthController::class, 'unauthorized']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth_passport:api'], function(){

        Route::get('getUser', [AuthController::class, 'getUser']);
        Route::post('logout', [AuthController::class, 'logout']);

        Route::post('employees', [EmployeeController::class, 'store']);
/*
        Route::apiResources([
            'employees' => EmployeeController::class
        ]);*/

        //Route::apiResource(['employees'=>EmployeeController::class]);
    });
});