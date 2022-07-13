<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, $guards = null)
    {
        $user = $request->session()->get('user');
        $valid = User::where('username', $user)->first();
        
        if (!$valid) {
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}
