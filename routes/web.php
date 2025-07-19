<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CrewMemberController;
use App\Http\Controllers\TimeLogController;
use App\Http\Controllers\StowagePlanController;
use App\Http\Controllers\PerformanceDataController;
// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';

// Ruta pública para probar el correo
Route::get('/send-test-email', function () {
    try {
        Mail::to('david.maza@nssp.com.gt')->send(new TestMail());
        return "Correo de prueba enviado exitosamente!";
    } catch (\Exception $e) {
        return "Error al enviar el correo: " . $e->getMessage();
    }
})->name('send.test.email');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ================== NSSP - Operaciones Portuarias ==================
    Route::resource('clients', ClientController::class);
    Route::resource('vessels', VesselController::class);
    Route::resource('files', FileController::class);
    Route::resource('crew-members', CrewMemberController::class);
    Route::resource('time-logs', TimeLogController::class);
    Route::resource('stowage-plans', StowagePlanController::class);
    Route::resource('performance-data', PerformanceDataController::class);
    Route::get('/files/search', [FileController::class, 'search'])->name('files.search');
    Route::resource('time-logs', TimeLogController::class);

});
