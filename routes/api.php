<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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




Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('productos', ProductoController::class);


/* Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');




Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    // Intentamos autenticar al usuario
    if (Auth::attempt($credentials)) {
        $user = Auth::user();  // Aquí deberías obtener el usuario autenticado
        $token = $user->createToken('API Token')->plainTextToken;  // Crear el token

        return response()->json([
            'token' => $token,  // Enviar el token
            'user' => $user,  // También puedes devolver la información del usuario si es necesario
        ], 200);
    }

    return response()->json(['message' => 'Unauthorized'], 401);
}); */
