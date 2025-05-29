<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \App\Http\Middleware\EncryptCookie;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Definir los middleware para el grupo 'web', incluyendo los que ya vienen por defecto y el tuyo
        $middleware->append(\App\Http\Middleware\UpgradeToHttpsUnderNgrok::class);
    
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
