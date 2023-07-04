<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class MobileMasyarakatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( auth()->check() ) {
            if ( auth()->user()->hak_akses === 'orang_tua' ) {
                return $next($request);
            }
        }
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return Redirect::to(route('mobile.index'));
    }
}
