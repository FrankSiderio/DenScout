<?php

namespace App\Http\Middleware;

use Closure;

class CasAuth
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
      cas()->authenticate();

      $email = cas()->user();
      $userCwid = explode('@', $email)[0];

      // If we don't get a cwid back
      if($userCwid == "") {
        app()->abort('404');
      }

      session()->put('cwid', $userCwid);
      session()->put('email', $email);

      return $next($request);
    }
}
