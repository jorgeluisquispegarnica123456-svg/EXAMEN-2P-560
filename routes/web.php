<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Página de inicio
Route::get('/', function () {
    return <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; url=/productos">
        <title>Redirigiendo...</title>
    </head>
    <body>
        <p>Redirigiendo a la lista de productos...</p>
        <p>Si no te redirige automáticamente: <a href="/productos">Haz clic aquí</a></p>
    </body>
    </html>
    HTML;
});

// ✅ Rutas escritas a mano — sin Route::resource
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
// Ruta de prueba
Route::get('/prueba', function () {
    return '✅ ¡Las rutas funcionan!';
});
