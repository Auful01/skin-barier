<?php

use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CookieAdmin;
use App\Http\Middleware\CookieCheck;
use App\Http\Middleware\CookieMobile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin/login", function () {
    return view('pages.login');
})->middleware(CookieCheck::class);

Route::prefix('admin')->middleware(CookieAdmin::class)->group(function () {


    Route::get("/dashboard", function () {
        return view('pages.admin.dashboard');
    });

    Route::get("/skincare", [SkincareController::class, 'index']);

    Route::get("/analyze", [AnalyzeController::class, 'index']);

    Route::get("/solution", [SolutionController::class, 'index']);

    Route::get("/user", [UserController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::prefix('mobile')->group(function () {

    Route::get("/login", function () {
        return view('pages.mobile.signin');
    });

    Route::get("/register", function () {
        return view('pages.mobile.signup');
    });

    Route::get("/dashboard", function () {
        return view('pages.mobile.dashboard');
    })->middleware(CookieMobile::class);

    Route::get("/analyze", function () {
        return view('pages.mobile.analyze');
    })->middleware(CookieMobile::class);

    Route::get("/recommendation", function () {
        return view('pages.mobile.facewash-recom');
    })->middleware(CookieMobile::class);

    Route::get("/recommendation/{id}", function () {
        return view('pages.mobile.detail-recom');
    })->middleware(CookieMobile::class);

    Route::get("/result", function () {
        return view('pages.mobile.result');
    })->middleware(CookieMobile::class);

    Route::get("/profile", function() {
        return view('pages.mobile.profile');
    })->middleware(CookieMobile::class);

    Route::get("/profile/edit", function () {
        return view('pages.mobile.edit-profile');
    })->middleware(CookieMobile::class);

    Route::get('/logout', [AuthController::class, 'logoutMobile']);
});


