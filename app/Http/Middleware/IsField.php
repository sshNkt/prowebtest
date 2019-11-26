<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Auth;

class IsField
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->isField()) {
            return $next($request);
        }
        return redirect('profile')->withErrors(['Error: Please fill in your profile information']);
    }
}
