<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;

class Synodal
{
    protected $auth;

    /**
    * Create a new filter instance.
    *
    * @param Guard $auth
    * @return void
    */
    public function __construct(Guard $auth)
    {
      $this->auth =$auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->synodal())
        {
            return $next($request);
        }
        else
        {
          abort(503);
        }
    }
}
