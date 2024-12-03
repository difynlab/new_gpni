<?php

use App\Http\Middleware\SetLanguage;
use App\Http\Middleware\ValidateRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->name('backend.')->group(base_path('routes/backend.php'));
            Route::middleware('web')->name('frontend.')->group(base_path('routes/frontend.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectTo(function ($request) {
            if($request->is('admin/*')) {
                return route('backend.login');
            }
            return route('frontend.login');
        });
        $middleware->alias([
            'role' => ValidateRole::class,
            'set_language' => SetLanguage::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
