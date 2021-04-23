<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, \Closure $next, ...$guards)
    {
       $this->authenticate($request, $guards);
//
       $user = Auth::user();
//
//       if(!$user || 'Admin')
//
//           abort(401);
//        return $next($request);

        if($request->user()->role=='Admin'){
            return $next($request);
        }
        else{
            request()->session()->flash('error','You do not have any permission to access this page');
            return redirect()->route($request->user()->role);
        }
    }
}
