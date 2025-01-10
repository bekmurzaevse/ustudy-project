<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\TokenAbilityEnum;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    Route::get("test", function () {
        try{
            return "fdfdfdfdf";
        }catch(Exception $e){
            return $e->getMessage();
        }
    });
});


Route::prefix('auth')->middleware(['auth:sanctum', 'ability:' . TokenAbilityEnum::ISSUE_ACCESS_TOKEN->value])->group(function () {
    Route::post('refresh-token', [AuthController::class, 'refreshToken']);
});

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('test2', function () {
        return "authroization";
    });
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get("posts", [PostController::class, "posts"]);

});






