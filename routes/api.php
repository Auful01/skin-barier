<?php

use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\SolutionController;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware([JWTMiddleware::class])->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::prefix('skincare')->group(function () {
        Route::get('/', [SkincareController::class, 'index']);
        Route::get('/mobile', [SkincareController::class, 'indexMobile']);
        Route::post('/', [SkincareController::class, 'store']);
        Route::get('/{id}', [SkincareController::class, 'find']);
        Route::post('/{id}', [SkincareController::class, 'update']);
        Route::delete('/{id}', [SkincareController::class, 'destroy']);
    });

    Route::prefix('analyze')->group(function () {
        Route::get('/', [AnalyzeController::class, 'index']);
        Route::get('/mobile', [AnalyzeController::class, 'indexMobile']);
        Route::post('/', [AnalyzeController::class, 'store']);
        Route::get('/{id}', [AnalyzeController::class, 'find']);
    });

    Route::prefix('solution')->group(function () {
        Route::get('/', [SolutionController::class, 'index']);
        Route::get('/mobile', [SolutionController::class, 'indexMobile']);
        Route::post('/', [SolutionController::class, 'store']);
        Route::get('/{id}', [SolutionController::class, 'find']);
        Route::post('/{id}', [SolutionController::class, 'update']);
        Route::delete('/{id}', [SolutionController::class, 'destroy']);
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        // Route::get('/edit', [ProfileController::class, 'edit']);
        Route::post('/', [ProfileController::class, 'store']);
    });
});


Route::get('get-credentials', [AuthController::class, 'getCredentials']);


Route::get('/update-blynk/{pin}/{value}', function ($pin, $value) {
    $BLYNK_AUTH_TOKEN = env('BLYNK_AUTH_TOKEN');
    $url = 'https://blynk.cloud/external/api/update?token=' . $BLYNK_AUTH_TOKEN . '&' . $pin . '=' . $value;

    $response = file_get_contents($url);
    return response()->json(json_decode($response));
});

Route::get('/get-blynk/{pin}', function ($pin) {
    $BLYNK_AUTH_TOKEN = env('BLYNK_AUTH_TOKEN');
    $url = 'https://blynk.cloud/external/api/get?token=' . $BLYNK_AUTH_TOKEN . '&' . $pin;

    $response = file_get_contents($url);
    return response()->json(json_decode($response));
});
