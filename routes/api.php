<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("me", function () {
    return response()->json([
        "data" => "DATA"
    ]);
});

Route::get("params", function (Request $request) {
    return response()->json([
        "data"=> $request->all()
    ]);
});

Route::get("path/{id}", function ($id) {
    return response()->json([
        "id" => $id
    ]);
});

Route::post("store", function (Request $request) {
    return response()->json([
        "data"=> $request->all()
    ]);
});

Route::post("login", function (Request $request) {
    return response()->json([
        "data"=> $request->login
    ]);
});

Route::match(['put', 'patch'], 'update', function () {
    return response()->json([
        'data'=> "Put or PATCH"
    ]);
});



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get("info", function () {
//     return response()->json([
//         "message"=> "laravel",
//         "success" => true,
//         "data" => [
//             "bir" => 1,
//             "eki" => 2,
//         ],
//     ]);
// });




