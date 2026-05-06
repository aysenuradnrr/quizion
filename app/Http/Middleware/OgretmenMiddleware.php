<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OgretmenMiddleware {
    public function handle(Request $request, Closure $next) {
        if (!auth()->check() || auth()->user()->role !== 'ogretmen') {
            abort(403, 'Bu sayfaya erişim yetkiniz yok.');
        }
        return $next($request);
    }
}