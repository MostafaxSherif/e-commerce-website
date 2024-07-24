<?php

// File: app/Http/Middleware/Admin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response // Change Symfony\Component\HttpFoundation\Response to Illuminate\Http\Response
    {
        if (Auth::user()->user_type !== 'admin') {
            return redirect()->back();
        }

        return $next($request);
    }
}
