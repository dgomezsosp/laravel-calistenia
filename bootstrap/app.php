<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// :: significa que puedo usar directamente funciones de la clase Application, 
// -> Para concatenar funciones 
// arranca todos los archivos de configuración (config). Cada vez que se hace un cambio en un archivo de configuración: sail artisan config:cache
return Application::configure(basePath: dirname(__DIR__))
    // Se indican las rutas que se van a usar
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // estas rutas devuelven páginas web , vistas de blade , html
        commands: __DIR__.'/../routes/console.php', 
        health: '/up',
    )
    // Se indican los middlewares que se van a usar de forma global. Sino se pondría como se pone el ->create();
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    // Que quieres que hagas cuando haya una excepción. Se puede sacar información desde /storage/logs/laravel.log
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
