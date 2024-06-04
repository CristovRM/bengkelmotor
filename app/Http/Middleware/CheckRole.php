<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Periksa apakah pengguna memiliki salah satu dari peran yang diperlukan
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika tidak, kembalikan response yang sesuai
        return abort(403, 'Unauthorized.');
    }
}
