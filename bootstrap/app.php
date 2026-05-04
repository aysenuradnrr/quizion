<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Middleware Kaydı
 * Konum: bootstrap/app.php
 *
 * Laravel 11 kullanıyorsanız bu dosyayı güncelleyin.
 * Laravel 10 için aşağıdaki alternatifi kullanın.
 */

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // ── Özel middleware takma adları ──────────────────
        $middleware->alias([
            'ogrenci'  => \App\Http\Middleware\OgrenciMiddleware::class,
            'ogretmen' => \App\Http\Middleware\OgretmenMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();

/*
 * ════════════════════════════════════════════════════
 * LARAVEL 10 KULLANANLAR İÇİN ALTERNATİF:
 * app/Http/Kernel.php dosyasında $routeMiddleware dizisine ekleyin:
 *
 *   protected $routeMiddleware = [
 *       // ... mevcut middleware'ler ...
 *       'ogrenci'  => \App\Http\Middleware\OgrenciMiddleware::class,
 *       'ogretmen' => \App\Http\Middleware\OgretmenMiddleware::class,
 *   ];
 * ════════════════════════════════════════════════════
 */
