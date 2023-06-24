<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = auth()->user()) {
            if ($user->hak_akses === 'super_admin' || $user->hak_akses === 'petugas') {
                return $next($request);
            } else {
                return redirect()->route('index');
            }
        }
        return response()->json([
            'status' => "Bukan admin!"
        ]);
    }
}
