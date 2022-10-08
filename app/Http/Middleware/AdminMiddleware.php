<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
        if ($req->is('/')) {
            if ($req->session()->get('name')) {
                return redirect('/dashboard');   
            }

            return $next($req);            
        } else {
            if (!$req->session()->get('name')) {
                return redirect('/');
            }

            return $next($req);
        }
    }
}
