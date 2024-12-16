<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\TokenAbilityEnum;
use Illuminate\Support\Facades\Route;

Route::get("test", function () {
    return "fdfdfdfdf";
});


Route::prefix('auth')->middleware(['auth:sanctum', 'ability:' . TokenAbilityEnum::ISSUE_ACCESS_TOKEN->value])->group(function () {
    Route::post('refresh-token', [AuthController::class, 'refreshToken']);
});


Route::prefix('auth')->middleware(['guest:sanctum','ability:' . TokenAbilityEnum::ACCESS_TOKEN->value])->group(function () {
    Route::get('test', [AuthController::class, 'test']);
    Route::post('login', [AuthController::class, 'login']);

});

Route::prefix('auth')->middleware('auth:sanctum')->group(function () {
    Route::get('test2', function () {
        return "authroization";
    });
    Route::post('logout', [AuthController::class, 'logout']);
});



Route::get("posts", [PostController::class, "posts"]);




