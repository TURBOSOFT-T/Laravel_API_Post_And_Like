<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AuthorizePremiumFile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Check if the user is authorized to access the premium file
        if (!Auth::user()->isPremiumMember()) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}