<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class PartnerMiddleware
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

        if ($request->user() && $request->user()->role != 'partner')
        {
          return new Response(view('unauthorized')->with('role', 'PARTNER'));
        }
        return $next($request);

    }
}
