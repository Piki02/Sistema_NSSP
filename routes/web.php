<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail; // ¡Importante! Necesario para Mail::to()
use App\Mail\TestMail; // ¡Importante! Necesario para new TestMail()
// use App\Http\Controllers\Auth\AuthenticatedSessionController; // Esto no es necesario si usas auth.php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta de bienvenida (puedes mantenerla o cambiarla a tu login)
Route::get('/', function () {
    return view('welcome');
});

// ********** RUTAS DE AUTENTICACIÓN (Gestionadas por auth.php) **********
// Si ya has copiado tus diseños a resources/views/auth/login.blade.php
// y resources/views/auth/forgot-password.blade.php,
// esta línea manejará todas las rutas de autenticación con tus diseños.
require __DIR__.'/auth.php';

// ********** RUTA PARA ENVIAR CORREO DE PRUEBA (ACCESIBLE PÚBLICAMENTE) **********
// Sacamos esta ruta del middleware 'auth' para que puedas probarla sin iniciar sesión
Route::get('/send-test-email', function () {
    try {
        Mail::to('david.maza@nssp.com.gt')->send(new TestMail()); // Cambia a tu correo para recibir la prueba
        return "Correo de prueba enviado exitosamente!";
    } catch (\Exception $e) {
        return "Error al enviar el correo: " . $e->getMessage();
    }
})->name('send.test.email');

// ********** RUTAS PROTEGIDAS POR AUTENTICACIÓN (solo para usuarios logueados) **********
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); // Eliminé 'verified' si no es estrictamente necesario para la prueba

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});