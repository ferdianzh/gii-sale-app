<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, $guards = null)
    {
        $valid = $request->session()->get('logged_in');
        
        if (!$valid) {
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}
