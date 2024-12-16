<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    //
})->middleware(CheckUser::class);

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

Route::middleware('auth:sanctum')->get('/fichas', [FichaController::class, 'getFichas']);
Route::middleware('auth:sanctum')->get('/dados', [AlunoController::class, 'getMedidas']);


Route::fallback(function () {
    return redirect('/dashboard');
});
