<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsConfirmed
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
        {
            $user = Auth::user();

            if (!$user->isConfirmed()) {
                session()->flash('message', 'Confirm your email');
                return redirect()->route('confirm');
            }

            return $next($request);
        }
    }
}
